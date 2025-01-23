@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Vaccine</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('vaccine.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Vaccine Name and Description on the same row -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vaccine Name</label>
                            <input class="form-control" name="vaccine_name" type="text" placeholder="Enter Full Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control border-0" name="description" rows="5" placeholder="Your Message or Details" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Availability Status and Picture on the same row -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Availability Status</label>
                            <select name="availability_status" class="select">
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="picture" class="form-label fw-bold fs-5">Picture</label>
                        <div class="upload-container" style="display: flex; flex-direction: column; align-items: center; gap: 20px;">
                            <!-- Upload Box -->
                            <div class="upload-box" 
                                 style="border: 2px dashed #ccc; padding: 20px; text-align: center; background-color: #f9f9f9; cursor: pointer; width: 150px; height: 150px; position: relative;">
                                <span class="upload-text" 
                                      style="font-size: 18px; color: #007bff; font-weight: bold; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">+ Upload</span>
                                <input type="file" name="image" id="picture" 
                                       class="form-control" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;" 
                                       accept=".jpg,.jpeg,.png" required onchange="previewImage(event)">
                            </div>
                            <!-- New Box to Show the Selected Image -->
                            <div id="image-box" 
                                 style="border: 4px dashed silver; text-align: center; background-color: #f9f9f9; display: none; width: auto; height: auto;">
                                <img id="preview" src="" alt="Preview" 
                                     style="width: auto; height: auto; object-fit: contain; display: block; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="m-t-20 py-5 text-center">
                    <button class="btn btn-primary submit-btn">Add Vaccine</button>
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

    // Show Profile Pic Js Start

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
