@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Customer List
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('activity-log')}}"><i class="fa fa-dashboard"></i>Activity Logs</a></li>
            <li class="active">Activity Logs</li>
        </ol>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User List</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Ip Address</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_cnt = 1;
                            if ($userList):
                                foreach ($userList as $uList):
                                    ?>
                                    <tr>
                                        <td>{{ $sl_cnt++ }}.</td>
                                        <td>{{ $uList->fullname }}</td>
                                        <td>{{ $uList->mobile }}</td>
                                        <td>{{ $uList->email }}</td>
                                        <td>{{ $uList->address }}</td>
                                        <td>{{ $uList->client_ip }}</td>
                                        <td>{{ $uList->created_at }}</td>
                                        <td>
                                            <a class="btn btn-danger btn-xs" href="{{URL::to('/')}}/delete-user/{{$uList->id}}" onclick="return confirm('Are you sure want to delete !!!')">Delete</a>
                                            @if($uList->status == 1)
                                            <a class="btn btn-danger btn-xs" href="{{URL::to('/')}}/approve-customar/{{$uList->id}}/0">Block Now</a>
                                            @else
                                            <a class="btn btn-success btn-xs" href="{{URL::to('/')}}/approve-customar/{{$uList->id}}/1">Approve Now</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>	
@stop