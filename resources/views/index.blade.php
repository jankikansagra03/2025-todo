@extends('layouts.Guest')
@section('content')
    <header class="hero">
        <h1>Stay Organized & Productive</h1>
        <p class="lead">Manage your tasks effortlessly with our sleek and modern interface.</p>
        <a href="{{ URL::to('/') }}/login" class="btn btn-custom btn-lg">Get Started</a>
    </header>

    <section class="container text-center">
        <div class="features">
            <div class="feature-box">
                <i class="bi bi-check-circle display-4"></i>
                <h3 class="mt-3">Easy to Use</h3>
                <p>Quickly add, edit, and delete tasks with a user-friendly interface.</p>
            </div>
            <div class="feature-box">
                <i class="bi bi-clock display-4"></i>
                <h3 class="mt-3">Stay Organized</h3>
                <p>Prioritize tasks and track your progress effortlessly.</p>
            </div>
            <div class="feature-box">
                <i class="bi bi-share display-4"></i>
                <h3 class="mt-3">Accessible Anywhere</h3>
                <p>Manage your tasks from any device at any time.</p>
            </div>
        </div>
    </section>
@endsection
