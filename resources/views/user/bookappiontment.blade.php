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

<!-- Appointment Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg form-container">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Book Appointment</h5>
                        <h3 class="display-5">Schedule a Vaccination</h3>
                        <p>Fill in the details below to schedule an appointment for your child's vaccination.</p>
                    </div>
                    
                    <form method="POST" action="">
                        @csrf
                <div class="row g-3">        
                            <div class="col-12">
                                <label for="child_name" class="form-label fw-bold">Select Child Name</label>
                                <select name="child_name" id="child_name" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Child Name</option>
                                    <option value="Child 1">Child 1</option>
                                    <option value="Child 2">Child 2</option>
                                    <option value="Child 3">Child 3</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="appointment_datetime" class="form-label fw-bold">Appointment Date & Time</label>
                                <input type="datetime-local" name="appointment_datetime" id="appointment_datetime" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                            </div>
                            
                            <div class="col-12">
                                <label for="hospital" class="form-label fw-bold">Select Hospital</label>
                                <select name="hospital" id="hospital" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Hospital</option>
                                    <option value="Hospital 1">Hospital 1</option>
                                    <option value="Hospital 2">Hospital 2</option>
                                    <option value="Hospital 3">Hospital 3</option>
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <label for="child_name" class="form-label fw-bold">Vaccine Type</label>
                                <select name="child_name" id="child_name" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Vaccine Type</option>
                                    <option value="Child 1">Child 1</option>
                                    <option value="Child 2">Child 2</option>
                                    <option value="Child 3">Child 3</option>
                                </select>
                            </div>
                
                            <div class="col-12">
                                <label for="notes" class="form-label fw-bold">Additional Comments (Optional)</label>
                                <textarea name="notes" id="notes" class="form-control bg-light border-0 shadow-none" placeholder="Comments Here" rows="5" style="resize: none;"></textarea>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Book Appointment</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12 text-center mt-4">
                        <p>Need assistance? <a href="contact" class="text-primary">Contact us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

@endsection
