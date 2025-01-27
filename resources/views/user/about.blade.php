@extends('user.layout')

@section('content')
    

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="{{ asset('user/img/about.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About Us</h5>
                    <h1 class="display-4">Comprehensive Vaccination Services for Your Loved Ones</h1>
                </div>
                <p>Vaccination plays a vital role in protecting individuals and communities from serious diseases. By getting vaccinated, you help prevent the spread of harmful viruses and bacteria. Our vaccination services ensure that people of all ages are safeguarded from health risks. We offer a wide range of vaccines, making it easy for you and your family to stay protected. Join us in creating a healthier community, one vaccination at a time. Stay safe, stay protected, and make vaccination a priority for better health.</p>
                <div class="row g-3 pt-3">
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                            <h6 class="mb-0">Qualified<small class="d-block text-primary">Doctors</small></h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-procedures text-primary mb-3"></i>
                            <h6 class="mb-0">Emergency<small class="d-block text-primary">Services</small></h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                            <h6 class="mb-0">Accurate<small class="d-block text-primary">Testing</small></h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="fa fa-3x fa-ambulance text-primary mb-3"></i>
                            <h6 class="mb-0">Free<small class="d-block text-primary">Ambulance</small></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Search Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
            <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
            <h5 class="text-white fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
        </div>
        <div class="mx-auto" style="width: 100%; max-width: 600px;">
            <div class="input-group">
                <select class="form-select border-primary w-25" style="height: 60px;">
                    <option selected>Department</option>
                    <option value="1">Department 1</option>
                    <option value="2">Department 2</option>
                    <option value="3">Department 3</option>
                </select>
                <input type="text" class="form-control border-primary w-50" placeholder="Keyword">
                <button class="btn btn-dark border-0 w-25">Search</button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->


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
                        <img class="img-fluid h-100" src="{{ asset('user/img/team-1.jpg') }}" style="object-fit: cover;">
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
            <div class="team-item">
                <div class="row g-0 bg-light rounded overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <img class="img-fluid h-100" src="{{ asset('user/img/team-2.jpg') }}" style="object-fit: cover;">
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
            <div class="team-item">
                <div class="row g-0 bg-light rounded overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <img class="img-fluid h-100" src="{{ asset('user/img/team-3.jpg') }}" style="object-fit: cover;">
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
        </div>
    </div>
</div>
<!-- Team End -->



@endsection