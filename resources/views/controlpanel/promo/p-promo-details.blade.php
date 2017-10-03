@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Pending Details
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body"> 
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2">
                        <a class="btn btn-primary btn-xs" href="#" onclick="rejectmessage('<?php echo $promoDetails->id ?>')">Reject</a>
                        <a class="btn btn-primary btn-xs" href="{{URL::to('/')}}/update-info/{{$promoDetails->id}}/approved" onclick="return latlngvalidation()">Approve</a>
                    </div>
                    <div style="margin-top:2%;" class="col-lg-12">
                        <div class="panel panel-info">                                            
                            <div class="panel-body">
                                <!--                                <div style="padding:1%;" class="col-md-2">Banner:</div>-->
                                <div style="padding:1%;" class="col-md-12"><img src="{{URL::to('/')}}/images/productimages/{{ $promoDetails->banner_image }}" width="100%" height="300"></div>

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Title:</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{ $promoDetails->title }}</div>

                                <div style="padding:1%;" class="col-md-6">Keyword:</div>
                                <div style="padding:1%;" class="col-md-6">{{$promoDetails->keyword}}</div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">Mobile:</div>                                
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">
                                    <?php
                                    if ($promoDetails->mobile != '') {
                                        echo $promoDetails->mobile;
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </div>

                                <div style="padding:1%;" class="col-md-6">Start Date:</div>
                                <div style="padding:1%;" class="col-md-6">
                                    <?php
                                    if ($promoDetails->input_date_status == 1):
                                        if ($promoDetails->start_date != '') {
                                            $a = explode('-', $promoDetails->start_date);
                                            echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                        } else {
                                            echo 'N/A';
                                        }
                                    else:
                                        echo 'N/A';
                                    endif;
                                    ?>
                                </div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">End Date:</div>
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">
                                    <?php
                                    $a = explode('-', $promoDetails->end_date);
                                    echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                    ?>  
                                </div>

                                <div style="padding:1%;" class="col-md-6">Category:</div>
                                <div style="padding:1%;" class="col-md-6">
                                    <?php
                                    $category = DB::table('category')
                                            ->select(
                                                    'category.category_title'
                                            )
                                            ->join('address_details', 'category.id', '=', 'address_details.category_id')
                                            ->where('address_details.ref_deals_id', '=', $promoDetails->id)
                                            ->get();
                                    $my_category = '';
                                    if (count($category) > 0):
                                        foreach ($category as $cat):
                                            echo $my_category = $cat->category_title . ',';
                                        endforeach;
                                    else:
                                        echo 'N/A';
                                    endif;
                                    ?>
                                </div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">Brand:</div>
                                <?php
                                $bId = $promoDetails->ref_brand_id;
                                if (count($bId) > 0):
                                    $bName = DB::table('brand_list')->where('id', '=', $bId)->first();
                                    if (count($bName) > 0):
                                        $brand = $bName->brand_title;
                                    else:
                                        $brand = 'N/A';
                                    endif;
                                else:
                                    $brand = 'N/A';
                                endif;
                                ?>
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">{{$brand}}</div>

                                <div style="padding:1%;" class="col-md-6">Details:</div>
                                <div style="padding:1%;" class="col-md-6"><?php echo $promoDetails->details ?></div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">Web sites:</div>
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">{{ $promoDetails->url}}</div>


                                <div style="padding:1%;" class="col-md-6">Count:</div>
                                <div style="padding:1%;" class="col-md-6">{{ $promoDetails->hitcount}}</div>

                            </div>
                        </div>
                        <div style="text-align:center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $dealsId = $promoDetails->id;
        $dealsAddr = DB::table('brand_address_tbl')->where('ref_dealinfo_id', '=', $dealsId)->get();
        $id = 1;
        foreach ($dealsAddr as $value):
            ?>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body"> 
                        <div class="box-header with-border">
                            <h3 class="box-title">Address</h3>
                            <h5><span style="color:red">&nbsp;*</span>Please set Lat/Lng for the address</h5>
                        </div>
                        <div style="margin-top:2%;" class="col-lg-12">
                            <div class="panel panel-info">                                            
                                <div class="panel-body">
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Address:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{ $value->address }}</div>

                                    <div style="padding:1%;" class="col-md-6">Lat:</div>
                                    <div style="padding:1%;" class="col-md-6">
                                        <input class="latlngval" type="text" id="storelat<?php echo $id; ?>" value="<?php
                                        if ($value->lat != '') {
                                            echo $value->lat;
                                        }
                                        ?>" onchange="savelat('<?php echo $id ?>', '<?php echo $value->id ?>')">                                                                          
                                    </div>

                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Lng:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">
                                        <input class="latlngval" type="text" id="storelng<?php echo $id; ?>" value="<?php
                                        if ($value->lng != '') {
                                            echo $value->lng;
                                        }
                                        ?>" onchange="savelng('<?php echo $id ?>', '<?php echo $value->id ?>')">   
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $id++;
        endforeach;
        ?>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">                          
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="{{URL::to('update-reject')}}" >
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
    var Script = function () {
        $().ready(function () {
            $("#signupForm").validate({
                ignore: [],
                rules: {
                    messageid: "required",
                    details: "required",
                },
                messages: {
                    //brand_name: "Please enter your brand name",
                    //email: "Please enter a valid email address",
                    //password: "Please enter at least 6 characters",
                    // mobile: "Please enter a valid mobile number"
                }
            });
        });
    }();

    function savelat(divId, addId) {
        var storelat = $("#storelat" + divId).val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/')}}/storelatdata",
            data: {value: storelat, addressid: addId},
            success: function (result) {

            }
        }, "json");
    }

    function savelng(divId, addId) {
        var storelng = $("#storelng" + divId).val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/')}}/storelngdata",
            data: {value: storelng, addressid: addId},
            success: function (result) {

            }
        }, "json");
    }

    function rejectmessage(id) {
        $("#idddddd").val(id);
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
    }

    function latlngvalidation() {
        var flag = 1;
        $(".latlngval").each(function () {

            if ($(this).val().length == 0) {
                $(this).css('border', '1px solid red');
                flag = 0;
            }
        });
        if (flag == 1) {
            return true;
        } else {
            bootbox.alert("Please set correct Lat and Lng value!");
            return false;

        }
    }

    $('.latlngval').keypress(function (event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

</script>
@stop
