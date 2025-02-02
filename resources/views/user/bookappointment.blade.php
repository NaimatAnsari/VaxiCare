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
                    
                    <form method="POST" action="{{route('appointment.store')}}">
                        @csrf
                <div class="row g-3">        
                    <input type="text" value="{{Auth::user()->id}}" name="parent_id" id="parent_id" hidden>
                            <div class="col-12">
                                <label for="child_name" class="form-label fw-bold">Select Child Name</label>
                                <select name="child_id" id="child_name" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
{{$child}}
                                    <option value="" disabled selected>Select Child Name</option>
                                    @foreach ($child as $ch)
                                    <option value="{{$ch->id}}">{{$ch->name}}</option>
                    
                                    
                                    
                                    @endforeach
                                </select>
                            </div>
                           {{-- child_name<input type="number" name="child_id">
                            hospital_id<input type="number" name="hospital_id"> --}}

                            <div class="col-12">
                                <label for="hospital" class="form-label fw-bold">Select Hospital</label>
                                <select name="hospital_id" id="hospital" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Hospital</option>
                                    {{$hospital}}
                                    @foreach ($hospital as $hos)
                                    <option value="{{$hos->id}}">{{$hos->fullname}}</option>
                                        
                                    @endforeach

                                </select>
                            </div>
                            
                            
                            <div class="col-12">
                                <label for="appointment_date" class="form-label fw-bold">Appointment Date </label>
                                <input type="date" name="vaccination_date" id="appointment_date" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                            </div>
                            
                            
                            <div class="col-12">
                                <label for="appointment_time" class="form-label fw-bold">Appointment Time</label>
                                <input type="time" name="vaccination_time" id="appointment_time" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <label for="vaccine_type" class="form-label fw-bold">Vaccine Type</label>
                                <select name="vaccine_type" id="vaccine_type" class="form-control bg-light border-0 shadow-none" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Vaccine Type</option>
                                    @foreach ($vaccines as $vaccine)
                                        <option value="{{$vaccine->id}}">{{$vaccine->vaccine_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                
                            <div class="col-12">
                                <label for="notes" class="form-label fw-bold">Additional Comments (Optional)</label>
                                <input type="text" name="comment" id="notes" class="form-control bg-light border-0 shadow-none" placeholder="Comments Here">
                                </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Book Appointment</button>
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
<!-- Appointment End -->

<script>
    document.getElementById('appointment_date').addEventListener('change', function () {
        var date = new Date(this.value);
        var formattedDate = date.toISOString().split('T')[0]; // Converts to YYYY-MM-DD format
        this.value = formattedDate;
    });
</script>


@endsection
