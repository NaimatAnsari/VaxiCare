@extends('user.layout')

@section('content')

<style>
    /* Responsive Layout */
    @media (max-width: 768px) {
        .upload-container {
            flex-direction: column;
            align-items: flex-start;
        }
        .upload-box, #image-box {
            width: 120px;
            height: 120px;
        }
    }

    @media (max-width: 480px) {
        .upload-container {
            flex-direction: column;
            align-items: flex-start;
        }
        .upload-box, #image-box {
            width: 100px;
            height: 100px;
        }
        .upload-text {
            font-size: 14px;
        }
    }
</style>


<!-- Register Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Create an Account</h5>
                        <h3 class="display-5">Register to Get Started</h3>
                        <p>Fill in the details below to create your account. Whether you're a parent, a hospital, or an admin, joining us is quick and easy!</p>
                    </div>
                    
                    <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 ">
                                <input type="text" name="fullname" class="form-control bg-light border-0 shadow-none" placeholder="Full Name" style="height: 55px;"  pattern="[A-Za-z\s]+" title="Please enter a Valid Name" required>
                            </div>
                            <div class="col-12 ">
                                <input type="text" name="address" class="form-control bg-light border-0 shadow-none" placeholder="Address" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <select name="role" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="parent">Parent</option>
                                    <option value="hospital">Hospital</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <input type="email" name="email" class="form-control bg-light border-0 shadow-none" placeholder="Email Address" style="height: 55px;" required>
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
                                <label for="picture" class="form-label fw-bold fs-5">Picture</label>
                                <div class="upload-container" style="display: flex; align-items: center; gap: 20px;">
                                    <!-- Upload Box -->
                                    <div class="upload-box" 
                                         style="border: 2px dashed #ccc; padding: 20px; text-align: center; background-color: #f9f9f9; cursor: pointer; width: 150px; height: 150px; position: relative;">
                                        <span class="upload-text" 
                                              style="font-size: 18px; color: #007bff; font-weight: bold; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">+ Upload</span>
                                        <input type="file" name="picture" id="picture" 
                                               class="form-control" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;" 
                                               accept=".jpg,.jpeg,.png" required onchange="previewImage(event)">
                                    </div>
                                    
                                    <!-- New Box to Show the Selected Image -->
                                    <div id="image-box" 
                                         style="border: 4px dashed silver; width: 150px; height: 150px; text-align: center; background-color: #f9f9f9; display: none;">
                                        <img id="preview" src="" alt="Preview" 
                                             style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                    </div>
                                </div>
                                
                                <p class="mt-2" style="font-size: 14px; color: #555;">With white or blue background</p>
                                <p style="font-size: 14px; color: #555;">File size must be less than 1MB</p>
                                <p style="font-size: 14px; color: #555;">File type: jpg, jpeg, png</p>
                                <p style="font-size: 14px; color: #555;">Upload your recent passport size picture</p>
                                <p style="font-size: 14px; color: #555;">Your Face should be clearly visible without any Glasses</p>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12 text-center mt-4">
                        <p>Already have an account? <a href="login" class="text-primary">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register End -->



<script>

//  Show Profile Pic Js Start

    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('preview');
            const imageBox = document.getElementById('image-box');
            
            preview.src = e.target.result;
            imageBox.style.display = 'block'; // Show the box once the image is selected
        }
        
        if (file) {
            reader.readAsDataURL(file);
        }
    }


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

@if(session('success'))
<script>
    Swal.fire({
        title: 'Success',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif


@endsection
