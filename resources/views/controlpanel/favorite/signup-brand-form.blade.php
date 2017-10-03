@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Sign up New Brand
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
                    <h3 class="box-title">Sign up New Brand</h3>
                </div>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" role="form" action="{{URL::to('signup-store-admin')}}" method="POST">
                    <div class="panel-body">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Brand Name: <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="brand_name" class="form-control" id="brand_name" autocomplete="off" placeholder="Brand Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="email" name="email" class="form-control" id="email" autocomplete="off" onkeyup="checkUniqueEmail()" placeholder="Email" required>
                                <span id="unirueemailreq"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_title" class="col-sm-3 control-label">Phone Number : </label>
                            <div class="col-sm-2">
                                <div class="input-group">                                    
                                    <input type="text" class="form-control"   id="phnext" name="phnext"  value="+88" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control allownumericwithoutdecimal"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       maxlength = "11" id="mobile" name="mobile" autocomplete="off" placeholder="01xxxxxxxxx" onkeyup="mobilevalideold(this.val)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="password" name="password" autocomplete="off" class="form-control" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Confirm Password : <span style="color:red">&nbsp;*</span></label>
                            <div class="col-sm-7">
                                <input type="password" name="confirmpassword" autocomplete="off" class="form-control" id="confirmpassword" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success" onclick="return validationold()"> Save</button>
                                <a href="{{URL::to('signup-brand')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
                            </div>                                    
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function checkUniqueEmail() {
        var email = $("#email").val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/')}}/checkUniqueEmail",
            data: {value: email},
            success: function (data)
            {
                if (data == 0) {
                    $("#unirueemailreq").text("");
                    $("#email").css('border', '1px solid #ccc');
                    document.getElementById('signupForm').onsubmit = function () {
                        return true;
                    }
                }
                if (data == 1) {
                    $("#unirueemailreq").text("");
                    $("#unirueemailreq").text("This email is already used.");
                    $("#unirueemailreq").css('color', '#B94A48');
                    $("#email").css('border-color', '#B94A48');
                    document.getElementById('signupForm').onsubmit = function () {
                        return false;
                    }
                }
            }
        });
    }

    var Script = function () {
        $().ready(function () {
            $("#signupForm").validate({
                ignore: [],
                rules: {
                    brand_name: "required",
                    email: "required",
                    password: {
                        required: true,
                        minlength: 6
                    }, confirmpassword: {
                        required: true,
                        equalTo: "#password"
                    },
                    mobile: {
                        required: false,
                        minlength: 11,
                        maxlength: 11,
                        number: true
                    },
                },
                messages: {
                    brand_name: "Please enter your brand name",
                    email: "Please enter a valid email address",
                    password: "Please enter at least 6 characters",
                    mobile: "Please enter a valid mobile number"
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
</script>
@stop
