@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Update Vaccine</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('vaccine.update' , $vaccine->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <!-- Vaccine Name and Description on the same row -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vaccine Name</label>
                            <input class="form-control" value="{{ $vaccine->vaccine_name }}" name="vaccine_name" type="text" placeholder="Enter Full Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <input 
                                type="text" 
                                class="form-control border-0" 
                                value="{{ $vaccine->description }}" 
                                name="description" 
                                placeholder="Your Vaccine Description" 
                                required >
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <!-- Availability Status and Picture on the same row -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Availability Status</label>
                            <select name="availability_status" class="select">
                                <option value="Available" {{ $vaccine->availability_status == 'Available' ? 'selected' : '' }}>Available</option>
                                <option value="Unavailable" {{ $vaccine->availability_status == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
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
                                       accept=".jpg,.jpeg,.png" onchange="previewImage(event)">
                            </div>
                    
                            <!-- Image Preview Box -->
                            <div id="image-box" 
                                 style="border: 4px dashed silver; text-align: center; background-color: #f9f9f9; padding: 10px; display: {{ $vaccine->image ? 'block' : 'none' }};">
                                <img id="preview" 
                                     src="{{ $vaccine->image ? asset('storage/' . $vaccine->image) : '' }}" 
                                     alt="Preview" 
                                     style="display: block; margin: auto;">
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
                <div class="m-t-20 py-5 text-center">
                    <button class="btn btn-primary submit-btn">Update Vaccine</button>
                </div>
            </form>
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
    const imageBox = document.getElementById('image-box');
    const preview = document.getElementById('preview');

    // Show the preview box
    imageBox.style.display = 'block';

    // Set the selected file as the preview's source
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result; // Set the image source to the file's data
        };
        reader.readAsDataURL(file);
    }
}


</script>

@endsection
