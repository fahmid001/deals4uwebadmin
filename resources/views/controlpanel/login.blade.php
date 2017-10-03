<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DEALS4U LOGIN</title>

        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::to('/')}}/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="{{URL::to('/')}}/images/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="{{URL::to('/')}}/images/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="{{URL::to('/')}}/images/favicons/manifest.json">
        <link rel="mask-icon" href="{{URL::to('/')}}/images/favicons/safari-pinned-tab.svg" color="#fc3f76">
        <meta name="theme-color" content="#ffffff">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/ionicons.min.css') }}">
        <style type="text/css">
            body { 
                background-image: url("././images/blackbg.png");                 
            }
            .panel-default {
                opacity: 0.9;
                margin-top:30px;
            }
            .form-group.last { margin-bottom:0px; }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">

        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 10%;">
                    <img src="{{URL::to('images/logo.png')}}" width="300" height="125"/>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-lock"></span> &nbsp;Sign In</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="{{URL::to('login')}}" method="POST">
                                @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('success_message') }}</div>
                                @elseif (Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('error_message') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">
                                        Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" id="username" autocomplete="off" placeholder="Email" required>
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" autocomplete="off" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn btn-sm" style="background-color: rgb(252,63,118); color: #FFF"> Sign in</button>
                                        <a style="color: #C3CAB4; text-decoration: none !important;" href="{{URL::to('signup')}}">Create Account</a>
                                    </div>                                    
                                </div>                                
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ URL::asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
    </body> 
</html>
