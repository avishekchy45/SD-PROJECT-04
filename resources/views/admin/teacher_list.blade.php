@extends('layouts.admin')

@section('head')
<title>PUC-Admin | Teacher List</title>
@endsection

@section('main')
<ul class='navbar-nav d-flex flex-row mainopt'>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='addteacher'> Add Teacher </a>
    </li>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='teacherlist'> Teachers List </a>
    </li>
</ul>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    <!-- <span style="float: left; font-family: Palatino Linotype, Verdana; font-size: 12pt" class="listcaption">
        List of all Teachers ({{$data->count()}} Entries)
    </span><br><br> -->
    <table class='table table-sm table-striped table-hover table-responsive-sm text-center list' id='teacherlist'>
        <thead class="tableheader">
            <th>No.</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Actions</th>
        </thead>
        <tbody class="table-bordered">
            @if($data->count())
            @foreach($data as $value)
            <tr>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->teacher_id}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->name}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->email}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->phone_num}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->address}}</td>
                <td>
                    <a href="{{ URL::to('editteacher/'.$value->id)}}" class="btn btn-warning btn-sm animate__animated animate__fadeIn animate__fast">Update</a>&nbsp;
                    <a href="" class="btn btn-danger btn-sm animate__animated animate__fadeIn animate__slower" data-toggle="modal" data-target="#myModal{{$value->id}}">Delete</a>
                    <!-- Button to Open the Modal -->
                    <!-- The Modal -->
                    <div class="modal" id="myModal{{$value->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Confirmation</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    Are you sure you want to Delete {{$value->teacher_id}}?
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <a href="" class="btn btn-success">No</a>
                                    <a href="{{ URL::to('deleteteacher/'.$value->teacher_id)}}" class="btn btn-danger">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="7" class="alert alert-danger animate__animated animate__fadeIn animate__slower">No Teacher Found</td>
            </tr>
            @endif
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#teacherlist').DataTable();
        });
        $('#teacherlist').dataTable({
            "pagingType": "full_numbers",
            language: {
                paginate: {
                    first: '«',
                    previous: '‹',
                    next: '›',
                    last: '»'
                },
                aria: {
                    paginate: {
                        first: 'First',
                        previous: 'Previous',
                        next: 'Next',
                        last: 'Last'
                    }
                },
                "lengthMenu": "Show _MENU_ Entries<br><br>List of all Teachers ({{$data->count()}} Entries)",
                // "info": "",
            },
            "order": [],
            "lengthMenu": [10, 20, 50, 100],
            columnDefs: [{
                orderable: false,
                targets: [0, 4, 5, 6]
            }],
        });
    </script>
</div>
@endsection