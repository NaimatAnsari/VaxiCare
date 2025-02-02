@extends('admin.layout')

@section('content')
    

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Appointment Detials</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="addChildren" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Book Appointment</a>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Children ID</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Children Name</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        {{-- <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <label class="focus-label">Role</label>
                <select class="select floating">
                    <option>Select Role</option>
                    <option>Nurse</option>
                    <option>Pharmacist</option>
                    <option>Laboratorist</option>
                    <option>Accountant</option>
                    <option>Receptionist</option>
                </select>
            </div>
        </div> --}}
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Child Name</th>
                            <th>Hospital</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Vaccine Type</th>
                            <th>Comments </th>
                            <th>Vaccination Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
      @foreach ($bookings as $booking)
    
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$booking->child_name }}</td>
      <td>{{$booking->h_name }}</td>
      <td>{{$booking->vaccination_date }}</td>
      <td>{{$booking->vaccination_time }}</td>
      <td>{{$booking->vaccine_name }}</td>
      <td>{{$booking->comment}}</td>
      <td>{{$booking->status }}</td>
        <td>{{$booking->created_at}}</td>
        <td>{{$booking->updated_at}}</td>
      <td class="text-right">
        <div class="dropdown dropdown-action">
            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="editChildren"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>


      @endforeach
    
        
                        
                       
                    </tbody>
                </table>
            </div>
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