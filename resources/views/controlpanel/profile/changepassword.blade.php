@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Change Password
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
            <div class="panel panel-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>&nbsp;
                </div>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" action="{{URL::to('newpassword-store')}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="login_id" value="<?php echo Session::get('login_id');?>"
                    <div class="box-body" style="margin-top: 20px">
                        <div class="form-group">
                            <label for="branch_name" class="col-sm-3 control-label">Old Password<span style="color:red"> *</span></label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" autocomplete="off" id="old_password" name="old_password" required="required" autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="branch_code" class="col-sm-3 control-label">New Password<span style="color:red"> *</span></label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="branch_code" class="col-sm-3 control-label">Confirm New Password<span style="color:red"> *</span></label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required="required" autocomplete="off">
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button id="btnResetPwd" class="btn btn-primary" type="submit">Change</button>
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
                    //brand_name: "required",
                    old_password: "required",
                    password: {
                        required: true,
                        minlength: 6
                    }, confirmpassword: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    //brand_name: "Please enter your brand name",
                    //email: "Please enter a valid email address",
                    //password: "Please enter at least 6 characters",
                    //mobile: "Please enter a valid mobile number"
                }
            });
        });
    }();
</script>
<script type="text/javascript">

    function checkNewPassword(myValue) {

        var myValueLength = myValue.length;

        if ((myValueLength >= 6) && (myValue.match("[A-Z]")) && (myValue.match("[0-9]"))) {
            $("#new_password").css("border-color", "#008000");
            $("#new_password").css("color", "black");
            $("#btnResetPwd").prop("disabled", false);
            $('#conf_new_password').val('');
        } else {
            $("#new_password").css("border-color", "#FF0000");
            $("#new_password").css("color", "black");
            $("#btnResetPwd").prop("disabled", true);
        }
    }

    function checkConfPassword(myValue) {
        var myValueLength = myValue.length;

        var new_password = $('#new_password').val();

        if (myValueLength >= 6 && new_password == myValue && myValue.match("[A-Z]") && myValue.match("[0-9]")) {
            $("#conf_new_password").css("border-color", "#008000");
            $("#conf_new_password").css("color", "black");
            $("#btnResetPwd").prop("disabled", false);
        } else {
            $("#conf_new_password").css("border-color", "#FF0000");
            $("#conf_new_password").css("color", "black");
            $("#btnResetPwd").prop("disabled", true);
        }

    }

</script>
@stop
