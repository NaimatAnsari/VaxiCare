@extends('admin.layout')

@section('content')
    

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">User Feedbacks Details</h4>
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
                        @foreach ($feedbacks as $feedback)
                        <tr>
                            <td style="white-space: nowrap;">{{$loop->iteration }}</td>
                            <td style="white-space: nowrap;">{{$feedback->name}}</td>
                            <td style="white-space: nowrap;">{{$feedback->email}}</td>
                            <td style="white-space: nowrap;">{{$feedback->query_type}}</td>
                            <td style="white-space: nowrap;">{{$feedback->message}}</td>
                            
                        </tr>
                            

                        @endforeach

                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection