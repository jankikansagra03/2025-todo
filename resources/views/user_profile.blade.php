@extends('layouts.Guest')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <header class="hero">
                    <h1 class="text-center">User Profile</h1>
                </header>
                <div class="container">
                    <div class="row p">
                        <div class="col-lg-8 offset-lg-2 p-3" style="border: solid white; border-radius: 20px;">
                            <div class="row">
                                <!-- Left Column: Profile Image & Edit Button -->
                                <div class="col-md-4 text-center">
                                    <img src="Images/profile_pictures/{{ $userdata['file'] }}" alt="Profile Picture"
                                        class="rounded-circle" width="150" height="150">
                                    <form action="{{ URL::to('/') }}/userProfileImage" method="POST"
                                        enctype="multipart/form-data" class="mt-2">
                                        @csrf
                                        <input type="file" name="profile_image"
                                            class="form-control d-inline-block w-100">
                                        <br>
                                        <button type="submit" class="btn btn-custom m-2">Edit Profile
                                            Picture</button>
                                    </form>
                                </div>

                                <!-- Right Column: Profile Details -->
                                <div class="col-md-8">
                                    <h3 class="text-white">{{ $userdata['fname'] }}</h3>
                                    <p class="text-white">{{ $userdata['email'] }}</p>
                                    <p class="text-white">Mobile: {{ $userdata['mobile'] }}</p>
                                    <p class="text-white">Gender: {{ $userdata['gender'] }}</p>
                                    <p class="text-white">Qualification: {{ $userdata['edu'] }}</p>
                                    <div class="mt-3">
                                        <a href="{{ URL::to('/') }}/userChangeProfile" class="btn btn-custom">Edit
                                            Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
