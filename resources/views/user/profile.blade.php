@extends('user.layout')

@section('content')
    

  
  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editProfileForm">
            <div class="mb-3">
              <label for="editName" class="form-label">Name</label>
              <input type="text" class="form-control" id="editName" value="John Doe">
            </div>
            <div class="mb-3">
              <label for="editAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="editAddress" value="123 Street, City">
            </div>
            <div class="mb-3">
              <label for="editRole" class="form-label">Role</label>
              <select name="role" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                <option value="" disabled selected>Select Role</option>
                <option value="parent">Parent</option>
                <option value="hospital">Hospital</option>
                <option value="admin">Admin</option>
            </select>
            </div>
            <div class="mb-3">
              <label for="editEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="editEmail" value="john.doe@example.com">
            </div>
            <div class="mb-3">
              <label for="editPassword" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" name="password" value="12345678" class="form-control bg-light border-0 shadow-none" placeholder="Password" id="password"  style="height: 55px;" required>
                <button class="btn border-none shadow-none bg-light" type="button" id="toggle-password" >
                    <i class="fa fa-eye" id="eye-icon"></i>
                </button>
            </div>
            </div>
            <div class="mb-3">
            
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
            <button type="submit" class="btn btn-success w-100">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
      e.preventDefault();
      // Updating profile details dynamically
      document.getElementById('userName').innerText = document.getElementById('editName').value;
      document.getElementById('userAddress').innerText = document.getElementById('editAddress').value;
      document.getElementById('userRole').innerText = document.getElementById('editRole').value;
      document.getElementById('userEmail').innerText = document.getElementById('editEmail').value;
      document.getElementById('userPassword').innerText = '********'; // Password not displayed for security reasons
      // Close modal after saving
      const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
      modal.hide();
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
  
  


@endsection