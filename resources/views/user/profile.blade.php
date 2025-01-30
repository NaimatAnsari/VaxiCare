@extends('user.layout')

@section('content')
<div class="card shadow-sm p-4 rounded">
    <div class="w-100 d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">User Profile</h3>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
    </div>
    <div class="text-center mb-3">
        <div class="profile-frame d-inline-block p-2 border rounded-circle shadow">
            <img id="profileImage" class="avatar img-fluid rounded-circle border" src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="User Image" width="120">
        </div>
    </div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Name</th>
                <td class="user-name">Cristina Groves</td>
            </tr>
            <tr>
              <th>Address</th>
              <td class="user-address">714 Burwell Heights Road, Bridge City, TX</td>
          </tr>
          <tr>
                <th>Phone</th>
                <td><a href="#">770-889-6484</a></td>
            </tr>
      
        </tbody>
    </table>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editProfileForm">
                    <div class="mb-3 text-center">
                        <label class="form-label fw-bold">Current Profile Picture</label>
                        <div class="profile-frame d-inline-block p-2 border rounded-circle shadow">
                            <img id="modalProfileImage" class="avatar img-fluid rounded-circle border" src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="User Image" width="120">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" id="imageUpload" accept="image/*">
                    </div>
                    <div class="mb-3 text-center">
                        <label class="form-label fw-bold">Preview</label>
                        <div class="profile-frame d-inline-block p-2 border rounded-circle shadow">
                            <img id="imagePreview" class="avatar img-fluid rounded-circle border d-none" width="120">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" value="Cristina Groves">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="editAddress" value="714 Burwell Heights Road">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="editPhone" value="770-889-6484">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.profile-frame {
    width: 130px;
    height: 130px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border: 4px solid #ddd;
}
</style>

<script>
document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            preview.src = e.target.result;
            preview.classList.remove('d-none'); 
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('editProfileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    document.querySelector('.user-name').innerText = document.getElementById('editName').value;
    document.querySelector('.user-address').innerText = document.getElementById('editAddress').value;
    document.getElementById('profileImage').src = document.getElementById('imagePreview').src;
    bootstrap.Modal.getInstance(document.getElementById('editProfileModal')).hide();
});
</script>

@endsection
