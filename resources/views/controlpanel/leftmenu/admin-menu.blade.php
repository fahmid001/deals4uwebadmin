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
                    <i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'category')) ? 'active' : ''; ?>">
                <a href="{{URL::to('category')}}">
                     <i class="fa fa-th-large" aria-hidden="true"></i><span>Category</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'favorite')) ? 'active' : ''; ?>">
                <a href="{{URL::to('favorite')}}">
                    <i class="fa fa-plus-square" aria-hidden="true"></i><span>Follow</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'pending-list')) ? 'active' : ''; ?>">
                <a href="{{URL::to('pending-list')}}">
                     <i class="fa fa-question" aria-hidden="true"></i><span>Pending List</span> 
                </a>
            </li>            

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'approve-list')) ? 'active' : ''; ?>">
                <a href="{{URL::to('approve-list')}}">
                    <i class="fa fa-check" aria-hidden="true"></i><span>Approve List</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'reject-list')) ? 'active' : ''; ?>">
                <a href="{{URL::to('reject-list')}}">
                    <i class="fa fa-times" aria-hidden="true"></i><span>Reject List</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'unpublish-list')) ? 'active' : ''; ?>">
                <a href="{{URL::to('with-hold-list')}}">
                    <i class="fa fa-times" aria-hidden="true"></i><span>Withhold List</span> 
                </a>
            </li>
            
            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'admin-message')) ? 'active' : ''; ?>">
                <a href="{{URL::to('admin-message')}}">
                     <i class="fa fa-envelope" aria-hidden="true"></i><span>Message</span> 
                </a>
            </li>

            <li class="treeview <?php echo (isset($active_menu) && ($active_menu == 'reject-message')) ? 'active' : ''; ?>">
                <a href="{{URL::to('reject-message')}}">
                     <i class="fa fa-envelope" aria-hidden="true"></i><span>Reject Message</span> 
                </a>
            </li>
            
            <li class="treeview">
                <a href="{{URL::to('logout')}}">
                    <i class="fa fa-sign-out" aria-hidden="true"></i><span>Sign out</span> 
                </a>
            </li>
        </ul>
    </section>
</aside>
