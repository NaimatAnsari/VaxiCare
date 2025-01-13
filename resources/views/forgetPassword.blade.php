@extends('layout')

@section('content')

<!-- Forget Password Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Forget Password</h5>
                        <h3 class="display-5">Reset Your Password</h3>
                        <p>Enter your registered email address, and we'll send you a link to reset your password.</p>
                    </div>
                    
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="Email Address" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Reset Link</button>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <p>Remembered your password? <a href="resetPassword" class="text-decoration-none">Login Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Forget Password End -->

@endsection
