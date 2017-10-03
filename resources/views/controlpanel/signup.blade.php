<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Brand User Sign up</title>

        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::to('/')}}/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="{{URL::to('/')}}/images/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="{{URL::to('/')}}/images/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="{{URL::to('/')}}/images/favicons/manifest.json">
        <link rel="mask-icon" href="{{URL::to('/')}}/images/favicons/safari-pinned-tab.svg" color="#fc3f76">
        <meta name="theme-color" content="#ffffff">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/daterangepicker-bs3.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/ionicons.min.css') }}">
        <style type="text/css">
            body { 
                background-image: url("././images/blackbg.png");                 
            }
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
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 10%;"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-lock"></span> Sign Up
                        </div>                        
                        <form class="cmxform form-horizontal tasi-form" id="signupForm" role="form" action="{{URL::to('signup-store')}}" method="POST">
                            <div class="panel-body">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group">
                                    <label for="meta_title" class="col-sm-3 control-label">Brand Name: <span style="color:red">&nbsp;*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="brand_name" class="form-control" id="brand_name" autocomplete="off" placeholder="Brand Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email : <span style="color:red">&nbsp;*</span></label>
                                    <div class="col-sm-9">
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
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control allownumericwithoutdecimal"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               maxlength = "11" id="mobile" name="mobile" autocomplete="off" placeholder="01xxxxxxxxx" onkeyup="mobilevalideold(this.val)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Password : <span style="color:red">&nbsp;*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" autocomplete="off" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Confirm Password : <span style="color:red">&nbsp;*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" name="confirmpassword" autocomplete="off" class="form-control" id="confirmpassword" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-success" onclick="return validationold()"> Save</button>
                                        <a href="{{URL::to('login')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
                                    </div>                                    
                                </div> 
                            </div>
                        </form>
                    </div>                        
                </div>
            </div>
        </div>
        <script src="{{ URL::asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('/js/dataTables.bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
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
    </body> 
</html>
