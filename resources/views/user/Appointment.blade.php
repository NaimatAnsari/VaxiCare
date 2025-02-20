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
          <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Book Appointment</h5>
          <h1 class="display-4">Schedule Your Appointment</h1>
      </div>

      <div class="container-fluide px-5">

          <a href="/bookAppointment" class="btn btn-dark mb-3">Book Appointment </i></a>

          <table class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Parent Name</th>
        <th scope="col">Child Name</th>
        <th scope="col">Hospital Name</th>
        <th scope="col">Appointment Date</th>
        <th scope="col">Appointment Time</th>
        <th scope="col">Vaccination Type</th>
        <th scope="col">Comment</th>
        <th scope="col">Vaccination Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ($users as $bookApp)
          
      <tr>
        <td>{{$loop->iteration  }}</td>
        <td>{{$bookApp->parent_name }}</td>
        <td>{{$bookApp->child_name }}</td>
        <td>{{$bookApp->h_name }}</td>
        <td>{{$bookApp->vaccination_date }}</td>
        <td>{{$bookApp->vaccination_time }}</td>
        <td>{{$bookApp->vaccine_name }}</td>
        <td>{{$bookApp->comment}}</td>
        <td>{{$bookApp->status }}</td>
        {{-- <td>{{$bookApp->created_at }}</td>
        <td>{{$bookApp->updated_at }}</td> --}}
        
      <td>
        <a href="edit.php" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 hover-green me-3" ></i></a>
        <a href="delete.php" class="link-dark"><i class="fa-solid fa-trash fs-5 hover-red"></i></a>
      </td>
    </tr>


      @endforeach

      

    </tbody>
  </table>
      </div>

      <!-- <div class="container">
          <div class="text-center mb-4">
              <h3>Add New User</h3>
              <p class="text-muted">Complete the form below to add a new user</p>
          </div>

          <div class="container d-flex justify-content-center">
              <form action="" method="post" style="width:50vw; min-width:300px;">
                  <div class="row">
                      <div class="col">
                          <label class="form-label">First Name:</label>
                          <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" required>
                      </div>

                      <div class="col">
                          <label class="form-label">Last Name:</label>
                          <input type="text" class="form-control" name="last_name" placeholder="Enter your last name"
                          required>
                      </div>

                      <div class="mb-3 mt-3">
                      <label class="form-label">Email:</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter your email"
                      required>
                      </div>

                      <div class="form-group mb-3">
                          <label >Gender:</label>&nbsp;
                          <input type="radio" class="form-check-input" name="gender" id="male" value="male" required>
                          <label for="male" class="form-input-label">Male</label>
                          &nbsp;
                          <input type="radio" class="form-check-input" name="gender" id="female" value="female" required>
                          <label for="female" class="form-input-label">Female</label>
                      </div>

                      <div>
                          <button type="submit" class="btn btn-success" name="submit">Save</button>
                          <a href="" class="btn btn-danger">Cancel</a>
                      </div>  
                  </div>
              </form>
          </div>
      </div> -->




  @endsection