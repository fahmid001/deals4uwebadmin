<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            </div>
            <div class="pull-left info">
            </div>
        </div>
        <ul class="sidebar-menu" >
            <?php
            $status = DB::table('brand_user_tbl')->where('id', '=', Session::get('login_id'))->first();
            $status = $status->status;
            ?>
            <?php if ($status == 1): ?>
                <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'dashboard')) ? 'active' : ''; ?>">
                    <a href="{{URL::to('dashboard')}}">
                        <i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span> 
                    </a>
                </li>

                <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'upload')) ? 'active' : ''; ?>">
                    <a href="{{URL::to('upload-brand')}}">
                        <i class="fa fa-upload" aria-hidden="true"></i><span>Upload</span> 
                    </a>
                </li>

                <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'promo')) ? 'active' : ''; ?>">
                    <a href="{{URL::to('promo-list')}}">
                        <i class="fa fa-list" aria-hidden="true"></i><span>Promo List</span> 
                    </a>
                </li>
                
                <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'profile')) ? 'active' : ''; ?>">
                    <a href="{{URL::to('/')}}/profile">
                        <i class="fa fa-list" aria-hidden="true"></i><span>Profile</span> 
                    </a>
                </li>

                <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'changepassword')) ? 'active' : ''; ?>">
                    <a href="{{URL::to('changepassword')}}">
                        <i class="fa fa-university"></i> <span>Change Password</span> 
                    </a>
                </li>
            <?php endif; ?>

            <li class="treeview">
                <a href="{{URL::to('logout')}}">
                    <i class="fa fa-sign-out" aria-hidden="true"></i><span>Sign out</span> 
                </a>
            </li>
        </ul>
    </section>
</aside>
