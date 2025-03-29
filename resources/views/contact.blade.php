@extends('layouts.Guest')
@section('content')
    <header class="hero">
        <h1>Get in Touch</h1>
        <p class="lead">We'd love to hear from you! Reach out to us for any inquiries.</p>
    </header>

    <section class="container mt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="content-section p-1">
                    <h2>Contact Information</h2>
                    <p><i class="bi bi-envelope-fill"></i> Email: support@todoapp.com</p>
                    <p><i class="bi bi-telephone-fill"></i> Phone: +123 456 7890</p>
                    <p><i class="bi bi-geo-alt-fill"></i> Address: 123 Productivity Lane, Task City, TC 45678</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-section p-1">
                    <h2>Contact Form</h2>
                    <form class="contact-form">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-light">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
