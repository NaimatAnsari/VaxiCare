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

<!-- Appointment Update Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row justify-content-center position-relative" style="margin-top: -50px; z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg form-container">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Update Appointment</h5>
                        <h3 class="display-5">Edit Vaccination Appointment</h3>
                        <p>Modify the details below to update the vaccination appointment for your child.</p>
                    </div>
                    
                    <form method="POST" action="{{route('appointment.update', $users->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">        
                            <div class="col-12">
                                <label for="child_name" class="form-label fw-bold">Select Child Name</label>
                                <select name="child_id" id="child_name" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled>Select Child Name</option>
                                    <option value="Child 1" {{ $users->child_id == 'Child 1' ? 'selected' : '' }}>Child 1</option>
                                    <option value="Child 2" {{ $users->child_id == 'Child 2' ? 'selected' : '' }}>Child 2</option>
                                    <option value="Child 3" {{ $users->child_id == 'Child 3' ? 'selected' : '' }}>Child 3</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="hospital" class="form-label fw-bold">Select Hospital</label>
                                <select name="hospital_id" id="hospital" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled>Select Hospital</option>
                                    <option value="Hospital 1" {{ $users->hospital_id == 'Hospital 1' ? 'selected' : '' }}>Hospital 1</option>
                                    <option value="Hospital 2" {{ $users->hospital_id == 'Hospital 2' ? 'selected' : '' }}>Hospital 2</option>
                                    <option value="Hospital 3" {{ $users->hospital_id == 'Hospital 3' ? 'selected' : '' }}>Hospital 3</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="appointment_date" class="form-label fw-bold">Appointment Date</label>
                                <input type="date" name="vaccination_date" id="appointment_date" class="form-control bg-light border-0 shadow-none" style="height: 55px;" value="{{ $users->vaccination_date }}" required>
                            </div>
                            
                            <div class="col-12">
                                <label for="appointment_time" class="form-label fw-bold">Appointment Time</label>
                                <input type="time" name="vaccination_time" id="appointment_time" class="form-control bg-light border-0 shadow-none" style="height: 55px;" value="{{ $users->vaccination_time }}" required>
                            </div>
                            
                            <div class="col-12">
                                <label for="vaccine_type" class="form-label fw-bold">Vaccine Type</label>
                                <select name="vaccine_type" id="vaccine_type" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled>Select Vaccine Type</option>
                                    <option value="Vaccine 1" {{ $users->vaccine_type == 'Vaccine 1' ? 'selected' : '' }}>Vaccine 1</option>
                                    <option value="Vaccine 2" {{ $users->vaccine_type == 'Vaccine 2' ? 'selected' : '' }}>Vaccine 2</option>
                                    <option value="Vaccine 3" {{ $users->vaccine_type == 'Vaccine 3' ? 'selected' : '' }}>Vaccine 3</option>
                                </select>
                            </div>
                
                            <div class="col-12">
                                <label for="notes" class="form-label fw-bold">Additional Comments (Optional)</label>
                                <input type="text" name="comment" id="notes" class="form-control bg-light border-0 shadow-none" placeholder="Comments Here" value="{{ $users->comment }}">
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update Appointment</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12 text-center mt-4">
                        <p>Need assistance? <a href="{{route('usercontact.create')}}" class="text-primary">Contact us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment Update End -->

<script>
    document.getElementById('appointment_date').addEventListener('change', function () {
        var date = new Date(this.value);
        var formattedDate = date.toISOString().split('T')[0]; // Converts to YYYY-MM-DD format
        this.value = formattedDate;
    });
</script>

@endsection
