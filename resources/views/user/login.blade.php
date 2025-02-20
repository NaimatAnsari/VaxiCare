@extends('user.layout')

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
                    
                    <form method="POST" action="authLogin" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="Email Address" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control bg-light border-0 shadow-none" placeholder="Password" id="password"  style="height: 55px;" required>
                                    <button class="btn border-none shadow-none bg-light" type="button" id="toggle-password" >
                                        <i class="fa fa-eye" id="eye-icon"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                            </div>
                            {{-- <div class="col-12 text-center mt-3">
                                <a href="forgetPassword" class="text-decoration-none">Forgot Password?</a>
                            </div> --}}
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

<script>



// Show & Hide Password JS
    

document.getElementById('toggle-password').addEventListener('click', function() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    
    // Toggle the password visibility
    if (passwordField.type === 'password') {
        passwordField.type = 'text';  // Show password
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';  // Hide password
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
});




</script>


@if(session('Wrong'))
<script>
    Swal.fire({
        title: 'Wrong',
        text: "{{ session('Wrong') }}",
        icon: 'error',
        confirmButtonText: 'OK'
    });
</script>
@endif



@endsection
