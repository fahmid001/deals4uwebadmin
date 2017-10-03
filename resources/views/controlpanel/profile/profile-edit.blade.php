@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>
</div>
<style type="text/css">
    /*form validation*/
    .cmxform .form-group label.error {
        display: inline;
        margin: 5px 0;
        color: #B94A48;
        font-weight: 400;
    }

    input:focus:invalid:focus, textarea:focus:invalid:focus, select:focus:invalid:focus, .cmxform .form-group input.error , .cmxform .form-group textarea.error{
        border-color: #B94A48 !important;
    }

    #signupForm label.error {
        display: inline;
        margin:5px 0px;
        width: auto;
        color: #B94A48;
    }

    .checkbox, .checkbox:hover, .checkbox:focus  {
        border:none;
    }
</style>
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
                    <h5><span style="color:red">&nbsp;*</span>Please fill up the form to access the full feature of the panel</h5>
                </div>
                <form  class="cmxform form-horizontal tasi-form" id="signupForm"  action="{{URL::to('update-brandinfo')}}" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" id="loginid" name="loginid" value="<?php echo Session::get('login_id'); ?>">
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Brand Logo : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input class="form-control" type="file" id="product_image" name="fthumb_1" required="required" onchange="return uploadimage()">
                                <p style=" margin-top: 5px"><span style="color:red;">&nbsp;*</span>File must be less than 100 KB</p>
                                <p><span style="color:red;">&nbsp;*</span>File format should be .png, .jpg or .jpeg</p>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Brand Name : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <?php
                                $loginId = Session::get('login_id');
                                $BrandId = DB::table('brand_user_tbl')->where('id', '=', $loginId)->first();
                                $BrandName = DB::table('brand_list')->where('id', '=', $BrandId->brand_name)->first();
                                ?>
                                <input type="text" id="brandname" name="brandname" class="form-control" autocomplete="off" value="<?php echo $BrandName->brand_title ?>" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Web sites : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="text" id="website" name="website" class="form-control" autocomplete="off" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Address : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="text" id="address" name="address" class="form-control" autocomplete="off" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Contact Person 1: <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="contact_person_1" name="contact_person_1" autocomplete="off" required="required" >
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Email : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email_1" name="email_1" autocomplete="off" required="required">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Mobile : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-2">
                                <div class="input-group">                                    
                                    <input type="text" class="form-control"   id="phnext" name="phnext"  value="+88" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control allownumericwithoutdecimal" id="mobile_1" name="mobile_1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength = "11" autocomplete="off" placeholder="01xxxxxxxxx" onkeyup="mobilevalideold(this.val)" autocomplete="off" required="required" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Contact Person 2: <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="contact_person_2" name="contact_person_2" autocomplete="off" required="required" >
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Email : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email_2" name="email_2" autocomplete="off" required="required">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Mobile : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-2">
                                <div class="input-group">                                    
                                    <input type="text" class="form-control"   id="phnext" name="phnext"  value="+88" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control allownumericwithoutdecimal" id="mobile_2" name="mobile_2" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength = "11" autocomplete="off" placeholder="01xxxxxxxxx" onkeyup="mobilevalideold(this.val)" required="required" >
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-success" type="submit" onclick="return validationold()">Save </button>&nbsp;&nbsp; 
                                <a href="{{URL::to('profile')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
<script>
var Script = function () {
    $().ready(function () {
        $("#signupForm").validate({
            ignore: [],
            rules: {
                email_1: "required",
                email_2: "required",
                mobile_1: "required",
                mobile_2: "required",
                    mobile_1: {
                        required: true,
                        minlength: 11,
                        maxlength: 11,
                        number: true
                    },
                    mobile_2: {
                        required: true,
                        minlength: 11,
                        maxlength: 11,
                        number: true
                    },
                    website: {
                        required: true,
                         url: true
                    },
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

$(".allownumericwithoutdecimal").on("keypress keyup blur", function (event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

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
</script>
@stop
