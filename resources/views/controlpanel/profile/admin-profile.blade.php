@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <?php
                    $user_id = Session::get('login_id');
                    $userdata = DB::table("admin_user_tbl")
                            ->where('id', $user_id)
                            ->first();
                    if (!empty($userdata->user_picture)) {
                        ?>
                        <div class="col-sm-12" style="text-align: center">
                            <img src="{{URL::to('/')}}/upload/picture/{{$userdata->user_picture}}" class="profile-user-img img-responsive img-circle"  alt="User Image"   style="width: 120px; height: 120px;"  >
                        </div>
                    <?php } else {
                        ?>
                        <div class="col-sm-12" style="text-align: center">
                            <img src="{{URL::to('/')}}/images/upload/1.jpg" class="profile-user-img img-responsive img-circle" alt="User Image"   style="width: 120px; height: 120px;" > 
                        </div>
                        <?php
                    }
                    ?>
                    <h3 class="profile-username text-center">

                        <p style="font-size: 12px; font-weight: bold">
                            <?php
                            echo 'Name : ' . $userdata->full_name;
                            ?>
                        </p>
                        <p style="font-size: 12px;  font-weight: bold">
                            <?php
                            echo 'Email : ' . $userdata->email;
                            ?>
                        </p>

                    </h3>
                       <!--<p class="text-muted text-center">Software Engineer</p>-->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
              

    </div>
</section>
<script type="text/javascript">
    function dashbordinfo() {
        var flag = 0;
        if ($("#meta_title").val() == '') {
            $("#meta_title").css('border', '1px solid red');
            $("#meta_titlereq").text('required!!!');
            $("#meta_titlereq").css('color', 'red');
            flag = 0;
            return false;
        } else {
            $("#meta_title").css('border', '');
            $("#meta_titlereq").text('');
            flag = 1;
        }
        if ($("#copy_right").val() == '') {
            $("#copy_right").css('border', '1px solid red');
            $("#copy_rightreq").text('required!!!');
            $("#copy_rightreq").css('color', 'red');
            flag = 0;
            return false;
        } else {
            $("#copy_right").css('border', '');
            $("#copy_rightreq").text('');
            flag = 1;
        }
        if ($("#meta_keyword").val() == '') {
            $("#meta_keyword").css('border', '1px solid red');
            $("#meta_keywordreq").text('required!!!');
            $("#meta_keywordreq").css('color', 'red');
            flag = 0;
            return false;
        } else {
            $("#meta_keyword").css('border', '');
            $("#meta_keywordreq").text('');
            flag = 1;
        }
        if ($("#description").val() == '') {
            $("#description").css('border', '1px solid red');
            $("#descriptionreq").text('required!!!');
            $("#descriptionreq").css('color', 'red');
            flag = 0;
            return false;
        } else {
            $("#description").css('border', '');
            $("#descriptionreq").text('');
            flag = 1;
        }

        if (flag == 1) {
            return true;
        }
    }
</script>
@stop
