<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        $brandId = Session::get('brand_id');
        if ($brandId != NULL):
            $brandName = DB::table('brand_list')->where('id', '=', $brandId)->first();
            if ($brandName):
                $title = $brandName->brand_title;
            else:
                $title = 'Admin Panel';
            endif;
        else:
            $title = 'Admin Panel';
        endif;
        ?>
        <title><?php echo $title ?></title>
        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::to('/')}}/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="{{URL::to('/')}}/images/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="{{URL::to('/')}}/images/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="{{URL::to('/')}}/images/favicons/manifest.json">
        <link rel="mask-icon" href="{{URL::to('/')}}/images/favicons/safari-pinned-tab.svg" color="#fc3f76">
        <meta name="theme-color" content="#ffffff">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/daterangepicker-bs3.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/dataTables.bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/AdminLTE.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/skins/_all-skins.css') }}">
        <script src="{{ URL::asset('/js/jQuery-2.1.4.min.js') }}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('datepicker/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('datepicker/datepicker.css') }}">

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('controlpanel.topmenu.top-menu')
            <?php $level = Session::get('level'); ?>
            <?php if ($level == 'buser'): ?>
                @include('controlpanel.leftmenu.user-menu')
            <?php else: ?>
                @include('controlpanel.leftmenu.admin-menu')
            <?php endif; ?>
            <div class="content-wrapper"style=" background-color:#FAF8F7" >

                @yield('content')

            </div>
            <footer class="main-footer"color: white">
                    <strong>Copyright &copy; 2017 DEALS4U <a href="" style="color: #4d90fe"></a>&nbsp;</strong>
            </footer>
        </div>

        <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('/js/select2.full.min.js') }}"></script>
        <script src="{{ URL::asset('/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('/js/jquery.inputmask.js') }}"></script>
        <script src="{{ URL::asset('/js/jquery.inputmask.date.extensions.js') }}"></script>
        <script src="{{ URL::asset('/js/jquery.inputmask.extensions.js') }}"></script>
        <script src="{{ URL::asset('/js/app.min.js') }}"></script>        
        <script src="{{ URL::asset('/js/demo.js') }}"></script>
        <script src="{{ URL::asset('datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ URL::asset('datepicker/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('/js/bootbox.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>

    </body> 
</html>