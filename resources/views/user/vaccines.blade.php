@extends('user.layout')

@section('content')


    <!-- Vaccines Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Medical Packages</h5>
                <h1 class="display-4">Awesome Medical Programs</h1>
            </div>
            <div class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
                
                @foreach ($vaccines as $vaccine)
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <!-- Adjust the image to fill and maintain aspect ratio -->
                        <img class="img-fluid rounded-top" src="{{ asset('storage/' . $vaccine->image) }}" alt="" style="height: 225px; object-fit: cover; width: 100%;">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-primary">{{$vaccine->vaccine_name}}</h3>
                        </div>
                    </div>
                    <div class="text-center p-3">
                        <p>{{$vaccine->description}}</p>
                        <p class="badge text-white py-2 px-4 my-2" style="background-color: #3CB043;">{{ $vaccine->availability_status }}</p> <br>

                        @if (Auth::check())
                        <a href="/children" class="btn btn-outline-primary rounded-pill py-2 px-4 my-2">Apply Now</a>
                            
                        @else
                        <a href="/login" class="btn btn-outline-primary rounded-pill py-2 px-4 my-2">Apply Now</a>
                            
                        @endif

                        <!-- Added a 'Book Now' button -->
                    </div>
                </div>    
                @endforeach
                

            </div>
        </div>
    </div>
    <!-- Vaccines End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Hospitals</h5>
                <h1 class="display-4">Trusted Partner Hospitals</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative">
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="user/img/team-1.jpg" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Doctor Name</h3>
                                <h6 class="fw-normal fst-italic text-primary mb-4">Cardiology Specialist</h6>
                                <p class="m-0">Dolor lorem eos dolor duo eirmod sea. Dolor sit magna rebum clita rebum dolor</p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- More team items here -->
            </div>
        </div>
    </div>
    <!-- Team End -->


@endsection
