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

<!-- Appointment Edit Form Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg form-container">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Edit Appointment</h5>
                        <h3 class="display-5">Update Appointment Details</h3>
                        <p>Modify the details below to update your appointment.</p>
                    </div>
                    
                    <form method="POST" action="{{ route('appointment.update', $appointment->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="child_name" class="form-label fw-bold">Select Child Name</label>
                                <select name="child_id" id="child_name" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled>Select Child Name</option>
                                    @foreach($children as $child)
                                        <option value="{{ $child->id }}" {{ $appointment->child_id == $child->id ? 'selected' : '' }}>
                                            {{ $child->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="hospital" class="form-label fw-bold">Select Hospital</label>
                                <select name="hospital_id" id="hospital" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled>Select Hospital</option>
                                    @foreach($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}" {{ $appointment->hospital_id == $hospital->id ? 'selected' : '' }}>
                                            {{ $hospital->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="appointment_date" class="form-label fw-bold">Appointment Date</label>
                                <input type="date" name="vaccination_date" id="appointment_date" value="{{ $appointment->vaccination_date }}" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                            </div>

                            <div class="col-12">
                                <label for="appointment_time" class="form-label fw-bold">Appointment Time</label>
                                <input type="time" name="vaccination_time" id="appointment_time" value="{{ $appointment->vaccination_time }}" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                            </div>

                            <div class="col-12">
                                <label for="vaccine_type" class="form-label fw-bold">Vaccine Type</label>
                                <select name="vaccine_type" id="vaccine_type" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled>Select Vaccine Type</option>
                                    @foreach($vaccines as $vaccine)
                                        <option value="{{ $vaccine->id }}" {{ $appointment->vaccine_type == $vaccine->id ? 'selected' : '' }}>
                                            {{ $vaccine->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="notes" class="form-label fw-bold">Additional Comments (Optional)</label>
                                <input type="text" name="comment" id="notes" value="{{ $appointment->comment }}" class="form-control bg-light border-0 shadow-none" placeholder="Comments Here">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">Appointment Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="active" {{ $appointment->status == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="inactive" {{ $appointment->status == 'inactive' ? 'checked' : '' }}>
                                    <label class="form-check-label">Inactive</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update Appointment</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-12 text-center mt-4">
                        <p>Need assistance? <a href="{{ route('usercontact.create') }}" class="text-primary">Contact us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment Edit Form End -->

@endsection
