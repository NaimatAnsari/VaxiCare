@extends('admin.layout')

@section('content')
    

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Vaccination Detials</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('vaccine.create')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Vaccines</a>
        </div>
    </div>
    <div class="row filter-row">
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Vaccine Name</label>
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
        </div> 
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>--}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vaccine Name</th>
                            <th>Description</th>
                            <th>Availability Status</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vaccines as $vaccine)
      
    <tr>
      <td>{{$loop->iteration }}</td>
      <td>{{$vaccine->vaccine_name}}</td>
      <td>{{$vaccine->description}}</td>
      <td><b>{{$vaccine->availability_status}}</b></td>
      <td>
        <img 
            width="100" 
            height="100" 
            src="{{ asset('storage/' . $vaccine->image) }}" 
            class="rounded-circle m-r-5" 
            alt="{{ $vaccine->vaccine_name }}" 
            style="object-fit: cover; width: 100px; height: 100px; border-radius: 10px;">
    </td>
      <td>{{$vaccine->created_at}}</td>
      <td>{{$vaccine->updated_at}}</td>
      
      <td class="text-right">
        <div class="dropdown dropdown-action">
            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('vaccine.edit', $vaccine->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
            <!-- Delete Button with Modal Trigger -->
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{$vaccine->id}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>    
            
            </div>
        </div>
    </td>
</tr>



                        
<!-- Delete Modal for Each User -->
<div id="deleteModal{{$vaccine->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="admin/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure you want to delete this User?</h3>
                <div class="m-t-20">
                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>

                    <!-- Delete Form -->
                    <form action="{{ route('vaccine.destroy', $vaccine->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                        @endforeach
                        
                       
                    </tbody>
                </table>
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