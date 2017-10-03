<header class="main-header">
    <a href="{{URL::to('dashboard')}}" class="logo">

        <span class="logo-mini"><img style="width: 90%" src="{{URL::to('images/2.png')}}"/></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img style="width: 90%" src="{{URL::to('images/logo.png')}}"/></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php
                if (Session::get('level') == 'admin'):
                    $NumberOfBrand = DB::table('brand_dealinfo_tbl')->where('notification_flag', '=', 1)->get();
                endif;
                ?>
                <!--                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                         <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span class="label label-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 4 messages</li>
                                        <li>
                                            <ul class="menu">
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Support Team
                                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            AdminLTE Design Team
                                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Developers
                                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Sales Department
                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Reviewers
                                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">See All Messages</a></li>
                                    </ul>
                                </li>-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="{{URL::to('/')}}/images/upload/default_profile.png" class="user-image" alt="User Image">-->
                        <i style="color:#1D2939;"class="fa fa-user" aria-hidden="true"></i>
                        <span class="hidden-xs" style="color:#1D2939;">
                            <?php
                            if (Session::get('level') == 'admin'):
                                echo 'Admin User';
                            else:
                                $brandId = Session::get('brand_id');
                                $brandName = DB::table('brand_list')->where('id', '=', $brandId)->first();
                                if ($brandName):
                                    echo $brandName->brand_title;
                                endif;
                            endif;
                            ?>                           
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li>
                            <?php
                            $brandId = Session::get('brand_id');
                            if ($brandId):
                                $brandImage = DB::table('brand_user_tbl')->where('brand_name', '=', $brandId)->first();
                                if ($brandImage->brand_logo != NULL):
                                    ?>
                                    <img src="{{URL::to('/')}}/images/productimages/<?php echo $brandImage->brand_logo ?>" class="" width="100%" height="120" alt="User Image">
                                    <?php
                                else:
                                    ?>
                                    <img src="{{URL::to('/')}}/images/upload/default_profile.png" width="100%" height="120" alt="User Image">
                                <?php
                                endif;
                            else:
                                ?>
                                <img src="{{URL::to('/')}}/images/upload/default_profile.png" width="100%" height="120" alt="User Image">
                            <?php
                            endif;
                            ?>
                        </li>                        
                        <li class="user-footer">
                            <div class="pull-left">
                                <?php
                                if (Session::get('level') == 'admin'):
                                    ?>
                                    <a href="{{URL::to('/')}}/admin-profile" class="btn btn-default btn-flat">Profile</a>
                                    <?php
                                else:
                                    $status = DB::table('brand_user_tbl')->where('id', '=', Session::get('login_id'))->first();
                                    $status = $status->status;
                                    if ($status == 1):
                                        ?>
                                        <a href="{{URL::to('/')}}/profile" class="btn btn-default btn-flat">Profile</a>
                                        <?php
                                    endif;
                                endif;
                                ?>                                
                            </div>
                            <div class="pull-right">
                                <a href="{{URL::to('/')}}/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>