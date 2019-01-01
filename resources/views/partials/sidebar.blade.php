  <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        

<!--
        <li  {{{ (Request::is('dashboard') ? 'class=active' : '') }}}  >
          <a href="{{route('user.dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
             </span>
          </a>
        </li>
        -->
      





 
        <li   {{{ (Request::is('addproduct') || Request::is('manageproduct') ? 'class=active treeview' : 'class=treeview') }}}   
      >
          <a href="#">
            <i class="fa fa-folder"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('form.addproduct')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{route('view.manageproduct')}}"><i class="fa fa-circle-o"></i> Manage</a></li>
          
          </ul>
        </li>

        <li   {{{ (Request::is('addcategory') || Request::is('managecategory') ? 'class=active treeview' : 'class=treeview') }}}   
      >
          <a href="#">
            <i class="fa fa-folder"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('form.addcategory')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{route('view.managecategory')}}"><i class="fa fa-circle-o"></i> Manage</a></li>
          
          </ul>
        </li>
 
 





   
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>