@extends('admin.layout')

@section('content')
    

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">User Contacts Details</h4>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Query Type</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($contacts as $contact)
                        <tr>
                            <td style="white-space: nowrap;">{{$loop->iteration }}</td>
                            <td style="white-space: nowrap;">{{$contact->name}}</td>
                            <td style="white-space: nowrap;">{{$contact->email}}</td>
                            <td style="white-space: nowrap;">{{$contact->subject}}</td>
                            <td style="white-space: nowrap;">{{$contact->message}}</td>
                            
                        </tr>
                            

                        @endforeach

                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection