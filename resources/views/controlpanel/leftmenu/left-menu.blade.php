<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            </div>
            <div class="pull-left info">
            </div>
        </div>
        <ul class="sidebar-menu" >

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'dashboard')) ? 'active' : ''; ?>">
                <a href="{{URL::to('dashboard')}}">
                    <i class="fa fa-university"></i><span>Dashboard</span> 
                </a>
            </li>

            <li class="treeview<?php echo (isset($active_menu) && ($active_menu == 'category')) ? 'active' : ''; ?>">
                <a href="{{URL::to('category')}}">
                    <i class="fa fa-university"></i> <span>Category</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'sub-category')) ? 'active' : ''; ?>">
                <a href="{{URL::to('sub-category')}}">
                    <i class="fa fa-university"></i> <span>Upload</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'menu')) ? 'active' : ''; ?>">
                <a href="{{URL::to('menu')}}">
                    <i class="fa fa-university"></i> <span>Message</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'product')) ? 'active' : ''; ?>">
                <a href="{{URL::to('product-list')}}">
                    <i class="fa fa-university"></i> <span>Product List</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'product')) ? 'active' : ''; ?>">
                <a href="{{URL::to('productgallery')}}">
                    <i class="fa fa-university"></i> <span>Profile</span> 
                </a>
            </li>
            
<!--            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'merchant')) ? 'active' : ''; ?>">
                <a href="{{URL::to('merchant-setting')}}">
                    <i class="fa fa-university"></i> <span>Merchant Setting</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'agent')) ? 'active' : ''; ?>">
                <a href="{{URL::to('agent-setting')}}">
                    <i class="fa fa-university"></i> <span>Agent Setting</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'pendingorder')) ? 'active' : ''; ?>">
                <a href="{{URL::to('pendingorder')}}">
                    <i class="fa fa-university"></i> <span>Pending Order</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'completeorder')) ? 'active' : ''; ?>">
                <a href="{{URL::to('completeorder')}}">
                    <i class="fa fa-university"></i> <span>Completed Order</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'product')) ? 'active' : ''; ?>">
                <a href="{{URL::to('customers')}}">
                    <i class="fa fa-university"></i> <span>Customer List</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'activitylog')) ? 'active' : ''; ?>">
                <a href="{{URL::to('activity-logs')}}">
                    <i class="fa fa-university"></i> <span>Activity Logs</span> 
                </a>-->
            </li>

            <li class="treeview">
                <a href="{{URL::to('logout')}}">
                    <i class="fa fa-university"></i> <span>Logout</span> 
                </a>
            </li>
        </ul>
    </section>
</aside>
