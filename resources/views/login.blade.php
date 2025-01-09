@extends('layout')

@section('content')

<!-- Login Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Login to Your Account</h5>
                        <h3 class="display-5">Welcome Back!</h3>
                        <p>Enter your email and password to login. If you don't have an account, you can easily register.</p>
                    </div>
                    
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="Email Address" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="password" name="password" class="form-control bg-light border-0" placeholder="Password" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <a href="#" class="text-decoration-none">Forgot Password?</a>
                            </div>
                            <div class="col-12 text-center mt-2">
                                <p>Don't have an account? <a href="/register" class="text-decoration-none">Register Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

@endsection
