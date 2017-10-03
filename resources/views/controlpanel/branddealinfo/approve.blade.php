@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Approved List
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
                    <h3 class="box-title">Approved List</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Brand</th>
                                <th>Mobile</th>
                                <th>Start Date</th>
                                <th>End Date</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_no = 1;
                            if (count($branddealList) > 0):
                                foreach ($branddealList as $product):
                                    ?>
                                    <tr>
                                        <td>{{ $sl_no++ }}</td>
                                        <td>
                                            <?php
                                            $bId = $product->ref_brand_id;
                                            if ($bId):
                                                $catName = DB::table('brand_list')->where('id', '=', $bId)->first();
                                                if ($catName):
                                                    echo $catName->brand_title;
                                                endif;
                                            endif;
                                            ?>
                                        </td>
                                        <td>{{ $product->mobile}}</td>
                                        <td>
                                            <?php
                                            if ($product->input_date_status == 1):
                                                if ($product->start_date != '') :
                                                    $a = explode('-', $product->start_date);
                                                    echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                                else:
                                                    echo '';
                                                endif;
                                            endif;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $a = explode('-', $product->end_date);
                                            echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{URL::to('/')}}/approved-details/{{$product->id}}/approve">Details</a>
                                            <!--                                            <a class="btn btn-danger btn-xs" href="{{URL::to('/')}}/unpublish/{{$product->id}}/approved">Withhold</a>-->
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">                          
            <form class="cmxform form-horizontal tasi-form" id="signupForm2" method="post" action="{{URL::to('update-reject')}}" >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">                            
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4>Reason Of Reject</h4>
                    </div>
                    <?php
                    $rejectMessage = DB::table('reject_message_tbl')->get();
                    ?>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">Reason Reject : </label>
                                <div class="col-lg-7">
                                    <input class=" form-control" type="hidden" id="idddddd" name="idddddd"/>
                                    <input class=" form-control" type="hidden" id="approved" name="approved" value="approved"/>
                                    <select class="form-control" name="messageid" id="messageid" autocomplete="off" required="required">
                                        <option value=''>Select Reason Reject</option>
                                        @foreach($rejectMessage as $message)
                                        <option value="{{$message->id}}">{{$message->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                                                            
                        </div>
                    </div>
                    <div class="modal-footer" >
                        <button class="btn btn-success" type="submit">Save</button>
                        <button style="margin-right: 45%" data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                    </div>  
                </div>
            </form> 
        </div>                                        
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "lengthMenu": [[50, 10, 25, -1], [50, 10, 25, "All"]],
            columnDefs: [
                {orderable: false, targets: [-1]}
            ]
        });
    });

    function rejectmessage(id) {
        $("#idddddd").val(id);
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
    }
</script>
@stop
