@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add User</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" placeholder="Enter Full Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="Enter Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="select">
                                <option>User</option>
                                <option>Hospital</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" placeholder="Enter Email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    
                    
                </div>
                
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Notifications Delete --}}

<div id="delete_appointment" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="admin/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure you want to delete this user?</h3>
                <div class="m-t-20"> 
                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });

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


</script>

@endsection