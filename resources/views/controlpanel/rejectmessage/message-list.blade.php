@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Reject Message List
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('success_message') }}</div>
            @elseif (Session::has('error_message'))
            <div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('error_message') }}</div>
            @endif
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Message</h3>
                </div>
                <span class="tools pull-right" style="padding:0px 10px 5px 0px">
                    <a class="btn btn-success" href="{{URL::to('reject-message-form')}}">Add Message<i class="fa fa-plus"></i></a>
                </span>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_no = 1;
                            if (count($messageList) > 0):
                                foreach ($messageList as $msg):
                                    ?>
                                    <tr>
                                        <td>{{ $sl_no++ }}</td>
                                        <td>{{ $msg->title}}</td>
                                        <td>{{ $msg->details}}</td>
                                        <td>
                                            <?php
                                            if ($msg->date != '') {
                                                $a = explode('-', $msg->date);
                                                echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                            } else {
                                                echo '';
                                            }
                                            ?>
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
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "lengthMenu": [[50, 10, 25, -1], [50, 10, 25, "All"]]
        });
    });

    function confirm() {
        bootbox.confirm("Are you sure?", function (result) {
            if (result == true) {
                return true;
            } else {
                return false;
            }
            
        });
    }
</script>
@stop
