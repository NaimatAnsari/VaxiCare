@extends('user.layout')

@section('content')

<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Need Help?</h5>
            <h1 class="display-4">Vaccination Management Assistance</h1>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 100px; height: 70px; transform: rotate(-15deg);">
                        <i class="fa fa-2x fa-hospital-o text-white" style="transform: rotate(15deg);"></i>
                    </div>
                    <h6 class="mb-0">Vaccination Center</h6>
                    <p>123 Health St., New York, USA</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 100px; height: 70px; transform: rotate(-15deg);">
                        <i class="fa fa-2x fa-phone text-white" style="transform: rotate(15deg);"></i>
                    </div>
                    <h6 class="mb-0">+012 345 6789</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 200px;">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 100px; height: 70px; transform: rotate(-15deg);">
                        <i class="fa fa-2x fa-envelope text-white" style="transform: rotate(15deg);"></i>
                    </div>
                    <h6 class="mb-0">support@vmsystem.com</h6>
                </div>
            </div>
        </div>
        <div class="row justify-content-center position-relative" style=" z-index: 1;">
            <div class="col-lg-8">
                <div class="bg-white rounded p-5 m-5 mb-0 shadow-lg">
                    <form method="POST" action="">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-light border-0" name="name" placeholder="Your Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-light border-0" name="email" placeholder="Your Email" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <select class="form-control bg-light border-0" name="query_type" style="height: 55px;" required>
                                    <option value="" disabled selected>Select Query Type</option>
                                    <option value="schedule">Schedule a Vaccination</option>
                                    <option value="info">General Information</option>
                                    <option value="support">Technical Support</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-light border-0" name="message" rows="5" placeholder="Your Message or Details" required></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit Query</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection
