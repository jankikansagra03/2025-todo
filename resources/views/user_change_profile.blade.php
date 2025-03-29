@extends('layouts.Guest')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8 offset-2">
                <header class="hero">
                    <h1>
                        Change User Profile
                    </h1>
                </header>
                {{-- Display Tasks in a Responsive Table --}}
                <div class="card">
                    
                    <div class="card-body">
                        <form action="{{ URL::to('/') }}/loginAuth" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3 class="text-center">Change Profile</h3>
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
                                        <a href="{{ route('forgotPwd') }}" class="text-white"
                                            style="text-decoration: none">Forgot Your
                                            Password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn form-control btn-custom btn-lg">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
