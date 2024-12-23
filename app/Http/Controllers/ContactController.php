<?php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('student.contact');
    }

    // Handle the form submission
    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Store the message in the database
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Optional: Send a confirmation email
        // Mail::to($request->email)->send(new ContactFormConfirmation($request));

        // Redirect with a success message
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}

