@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Send Message
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
        </div>
        <div class="col-md-12">            
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Message Send</h3>
                </div>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="{{URL::to('send-message')}}" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">
                        <?php
                        $adminListQry = DB::table('admin_user_tbl')->get();
                        ?>
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Banner : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input class="form-control" type="file" id="product_image" name="fthumb_1" autocomplete="off" required="required"  onchange="return uploadimage()">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Details :<span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" id="details" name="details" autocomplete="off" onkeyup="countChar(this)" required="required" rows="5"></textarea>
                                <span style="color:#C2C2C2" id="charNum">1000 character left</span>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-success" type="submit">Send </button>&nbsp;&nbsp; 
                                <a href="{{URL::to('admin-message')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
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
                    product_image: "required",
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
    function uploadimage() {
        var fileUpload = document.getElementById("product_image");
        var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
        if (size > 100) {
            bootbox.alert("Image size must be within 100kb!");
            $("#product_image").val('');
            return false;
        }
        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    //Validate the File Height and Width.
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        if (height > 350 || width > 950) {
                            bootbox.alert("Height and Width must not exceed 950 x 350!");
                            $("#product_image").val('');
                            return false;
                        }
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Please select a valid Image file.");
            return false;
        }
    }

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
