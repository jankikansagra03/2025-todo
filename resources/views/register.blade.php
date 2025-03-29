@extends('layouts.Guest')
@section('content')
    <header class="hero">
        <h1>Create an Account</h1>
        <p class="lead">Join our community and start organizing your tasks.</p>
    </header>
    <div class="container">
        <div class="row p-4">
            <div class="col-lg-8 offset-lg-2 p-3  " style="border:solid white;border-radius:20px;">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Dont have an account, No issues createa one!</h3>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <form action="{{ URL::to('/') }}/register_action" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label text-white">Full Name</label>
                                <input type="text" class="form-control @error('fname') is-invalid @enderror"
                                    placeholder="Enter your full name" name="fname">
                                @error('fname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-white">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email" name="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" name="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                    placeholder="Confirm your password" name="confirm_password">
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="mb-3">
                            <label class="form-label text-white">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Mobile Number</label>
                            <input type="tel" class="form-control @error('mobile') is-invalid @enderror"
                                placeholder="Enter your mobile number" name="mobile">
                            @error('mobile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Profile Picture</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                name="profile_picture">
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label text-white">Educational Qualification</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="diploma" name="edu[]"
                                            value="Diploma">
                                        <label class="form-check-label text-white" for="diploma">Diploma</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="postGraduate" name="edu[]"
                                            value="Graduate">
                                        <label class="form-check-label text-white" for="postGraduate">Graduate</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="doctorate" name="edu[]"
                                            value="Post Graduate">
                                        <label class="form-check-label text-white" for="doctorate">Post
                                            Graduate</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Doctorate" name="edu[]"
                                            value="Doctorate">
                                        <label class="form-check-label text-white" for="Doctorate">Doctorate</label>
                                    </div>
                                </div>

                            </div>
                            @error('edu')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn form-control btn-custom btn-lg">Create Account</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
