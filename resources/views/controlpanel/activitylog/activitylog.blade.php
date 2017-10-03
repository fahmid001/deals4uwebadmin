@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Activity Logs
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
                    <h3 class="box-title">Activity Log List</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Operation</th>
                                <th>Operation Type</th>
                                <th>Email</th>
                                <th>Ip Address</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_cnt = 1;
                            if ($activityLogList):
                                foreach ($activityLogList as $logList):
                                    ?>
                                    <tr>
                                        <td>{{ $sl_cnt++ }}.</td>
                                        <td>{{ $logList->act_operation }}</td>
                                        <td>{{ $logList->act_operation_type }}</td>
                                        <td>{{ $logList->act_userid }}</td>
                                        <td>{{ $logList->act_ip_address }}</td>
                                        <td>{{ $logList->act_operation_date }}</td>
                                        <td>{{ $logList->act_operation_time }}</td>
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