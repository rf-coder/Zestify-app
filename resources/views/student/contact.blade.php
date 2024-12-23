@extends('layouts.web')
@section('title', 'Contact Us')

@section('content')
    <!-- Hero Section -->
    <section class="hero text-center">
        <div class="hero-text">
            <h1>Get in Touch with Us</h1>
            <p>We'd love to hear from you! Fill out the form below, and we'll get back to you as soon as possible.</p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/banner.png') }}" class="img-fluid" alt="Hero Image">
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form py-5">
        <div class="container">
            <h2 class="text-center">Contact Form</h2>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/contact') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                </div>
                <button class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-info py-5 text-center">
        <div class="container">
            <h2>Contact Information</h2>
            <p>If you prefer to reach us directly, you can use the following contact methods:</p>
            <p>Email: <a href="mailto:info@zestify.com">info@zestify.com</a></p>
            <p>Phone: <a href="tel:+922112345678">+92 21 1234 5678</a></p>
            <p>Address: 123 Zestify Lane, Karachi, Pakistan</p>
        </div>
        <button id="goTopBtn" class="go-top"><i class="fas fa-arrow-up"></i></button>
    </section>
@endsection
