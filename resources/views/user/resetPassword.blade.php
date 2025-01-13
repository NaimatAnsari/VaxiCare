@extends('user.layout')

@section('content')

<!-- Reset Password Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Reset Your Password</h5>
                        <h3 class="display-5">Create a New Password</h3>
                        <p>Please enter your new password below to reset it.</p>
                    </div>
                    
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="token" value=""> <!-- Token from the backend -->
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="Email Address" style="height: 55px;" value="{{ $email ?? old('email') }}" required readonly>
                            </div>
                            <div class="col-12">
                                <input type="password" name="password" class="form-control bg-light border-0" placeholder="New Password" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="password" name="password_confirmation" class="form-control bg-light border-0" placeholder="Confirm Password" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reset Password End -->

@endsection
