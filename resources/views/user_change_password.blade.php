@extends('layouts.Guest')
@section('content')
    <header class="hero">
        <h1>Change Password</h1>
        <p class="lead">Password Compromised!! Change it here.</p>
    </header>
    <div class="col-md-4 offset-md-4 p-3" style="border:solid white;border-radius:20px">

        <form action="{{ URL::to('/') }}/userChangePassword" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
                @error('old_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
                @error('new_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="">
                @error('confirm_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <button type="submit" class="btn form-control btn-custom btn-lg">Change Password</button>
            </div>
        </form>
    </div>
@endsection
<br>
