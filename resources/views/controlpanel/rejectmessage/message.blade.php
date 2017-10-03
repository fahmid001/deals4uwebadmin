@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Add Message
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">            
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Message Add</h3>
                </div>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="{{URL::to('store-message')}}" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">
                        <?php
                        ?>
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Message Title : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" id="message_title" name="message_title" autocomplete="off" required="required">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Message Details :<span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" id="details" name="details" autocomplete="off" onkeyup="countChar(this)" required="required" rows="5"></textarea>
                                <span style="color:#C2C2C2" id="charNum">1000 character left</span>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-success" type="submit">Save </button>&nbsp;&nbsp; 
                                <a href="{{URL::to('reject-message')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    var Script = function () {
        $().ready(function () {
            $("#signupForm").validate({
                ignore: [],
                rules: {
                    message_title: "required",
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
</script>
<script type="text/javascript">
    function countChar(val) {
        var len = val.value.length;
        if (len >= 1000) {
            val.value = val.value.substring(0, 1000);
        } else {
            $('#charNum').text(1000 - len);
        }
    }
</script>
@stop
