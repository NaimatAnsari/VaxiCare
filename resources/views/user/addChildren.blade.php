@extends('user.layout')

@section('content')

<style>
    /* Responsive Layout */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .form-container h3 {
            font-size: 22px;
        }
        .form-container h5 {
            font-size: 16px;
        }
    }
</style>

<!-- Form Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg form-container">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Form</h5>
                        <h3 class="display-5">Add Parent and Child Details</h3>
                        <p>Fill in the details below to submit the required information.</p>
                    </div>
                    
                    <form method="POST" action="{{route('children.store')}}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="parent_id" class="form-label fw-bold">Parent</label>
                                <input type="text" value="{{Auth::user()->id}}" name="parent_id" id="parent_id" hidden>
                                <input type="text" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required value="{{Auth::user()->fullname}}" readonly>
                            </div>

                            <div class="col-12">
                                <label for="name" class="form-label fw-bold">Name</label>
                                <input type="text" name="name" id="name" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                            </div>

                            <div class="col-12">
                                <label for="dob" class="form-label fw-bold">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="dob" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                            </div>

                            <div class="col-12">
                                <label for="gender" class="form-label fw-bold">Gender</label>
                                <select name="gender" id="gender" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->

@endsection
