@extends('layouts.Guest')

@section('content')
    <header class="hero">
        <h1>Forgot Your Password?</h1>
        <p class="lead">No worries, we will help you reset it.</p>
    </header>
    <div class="col-md-4 offset-md-4 p-3" style="border:solid white;border-radius:20px">

        <form action="{{ URL::to('/') }}/login_action" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center">Generate a new Password!!</h3>
            <br>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between">

                    <div>
                        <a href="{{ route('signin') }}" class="text-white" style="text-decoration: none">Remeber
                            Password? Login Here</a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn form-control btn-custom btn-lg">Send OTP</button>
            </div>
        </form>
    </div>
@endsection
<br>
