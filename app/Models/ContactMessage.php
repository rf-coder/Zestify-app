<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model
    protected $table = 'contact_messages';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = ['name', 'email', 'message'];

    
}
