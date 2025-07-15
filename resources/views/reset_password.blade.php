@extends('layouts.Guest')
@section('content')
    <header class="hero">
        <h1>Reset Password</h1>
        <p class="lead">Forgot your password!. Reset Here</p>
    </header>
    <div class="col-md-4 offset-md-4 p-3" style="border:solid white;border-radius:20px">

        <form action="{{ URL::to('/') }}/UpdatePassword" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center">Generate New Password</h3>
            <br>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="checkbox" name="remember" id="remember" value="remember"> Remember Me
                    </div>
                    <div>
                        <a href="{{ route('ForgotPassword') }}" class="text-white" style="text-decoration: none">Forgot Your
                            Password?</a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn form-control btn-custom btn-lg">Update Password</button>
            </div>
        </form>
    </div>
@endsection
<br>
