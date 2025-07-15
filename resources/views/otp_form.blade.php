@extends('layouts.Guest')

@section('content')
    <header class="hero">
        <h1>OTP Verification</h1>
        <p class="lead">Enter OTP and reset your password.</p>
    </header>
    <div class="col-md-4 offset-md-4 p-3" style="border:solid white;border-radius:20px">

        <form action="{{ URL::to('/') }}/VerifyOTP" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center">Verify your OTP here.</h3>
            <br>
            <div class="mb-3">
                <label for="otp" class="form-label">OTP</label>
                <input type="text" class="form-control" id="otp" name="otp">
                @error('otp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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
                <button type="submit" class="btn form-control btn-custom btn-lg">Verify OTP</button>
            </div>
        </form>
    </div>
@endsection
<br>
