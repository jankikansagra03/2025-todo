@extends('layouts.Guest')
@section('content')
    <header class="hero">
        <h1>Login to Your Account</h1>
        <p class="lead">Access your tasks and stay organized.</p>
    </header>
    <div class="col-md-4 offset-md-4 p-3" style="border:solid white;border-radius:20px">

        <form action="{{ URL::to('/') }}/loginAuth" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center">Welcome Back!!</h3>
            <br>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="checkbox" name="remember" id="remember" value="remember"> Remember Me
                    </div>
                    <div>
                        <a href="{{ route('forgotPwd') }}" class="text-white" style="text-decoration: none">Forgot Your
                            Password?</a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn form-control btn-custom btn-lg">Login</button>
            </div>
        </form>
    </div>
@endsection
<br>
