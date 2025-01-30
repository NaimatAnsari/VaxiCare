@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Book Appointment</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Child</label>
                            <select class="select">
                                <option>Select</option>
                                <option>Jennifer Robinson</option>
                                <option>Terry Baker</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Hospital</label>
                            <select class="select">
                                <option>Select</option>
                                <option>Dentists</option>
                                <option>Neurology</option>
                                <option>Opthalmology</option>
                                <option>Orthopedics</option>
                                <option>Cancer Department</option>
                                <option>ENT Department</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <div class="cal-icon">
                                <input type="date" class="form-control datetimepicker">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="time-icon">
                                <input type="time" class="form-control" id="datetimepicker3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Vaccine Type</label>
                            <select class="select">
                                <option>Select</option>
                                <option>Dentists</option>
                                <option>Neurology</option>
                                <option>Opthalmology</option>
                                <option>Orthopedics</option>
                                <option>Cancer Department</option>
                                <option>ENT Department</option>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                    <label>Additional Comments (Optional)</label>
                    i
                    <input type="text" class="form-control"></textarea>
                </div>
                
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Appointment</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Notifications Delete --}}

<div id="delete_appointment" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="admin/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Appointment?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });
</script>
    
@endsection