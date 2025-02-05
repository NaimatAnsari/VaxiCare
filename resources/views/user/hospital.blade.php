@extends('user.layout')

@section('content')

<style>
  .hover-red {
    color: red;         /* Optional: Adjust text color */
  }

  .hover-green {
    color: #3CB371;         /* Optional: Adjust text color */
  }
</style>

<body>
    <div class="text-center mx-auto mb-5 mt-5" style="max-width: 500px;">
        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Hospital Manage Appointments</h5>
        <h1 class="display-4">Vaccination Appointment Dashboard</h1>
    </div>

    <div class="container-fluide px-4 py-5">
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Child Name</th>
                    <th scope="col">Hospital Name</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Vaccination Type</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Vaccination Status</th>
                    <th scope="col">Update Vaccination Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $bookApp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bookApp->child_name }}</td>
                        <td>{{ $bookApp->h_name }}</td>
                        <td>{{ $bookApp->vaccination_date }}</td>
                        <td>{{ $bookApp->vaccination_time }}</td>
                        <td>{{ $bookApp->vaccine_name }}</td>
                        <td>{{ $bookApp->comment }}</td>
                        <td>{{ $bookApp->status }}</td>
                        <td>
                          <form action="{{ route('appointment.update', $bookApp->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <select name="status" class="form-select" onchange="setTimeout(() => { this.form.submit(); }, 500)"  
    {{ $bookApp->status == 'Pending' ? '' : 'disabled' }}>
    <option value="" disabled selected>Update Vaccination Status</option>
    <option value="Vaccinated" {{ $bookApp->status == 'Vaccinated' ? 'selected' : '' }}>Vaccinated</option>
    <option value="Cancelled" {{ $bookApp->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
</select>
                          </form>
                      </td>
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection