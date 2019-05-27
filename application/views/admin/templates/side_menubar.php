<aside class="main-sidebar" style="position: fixed;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('admin') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

            <li class="treeview" id="adminMainNav">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Admin</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="createAdminSubNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Add Admin</a></li>

                <li id="manageAdminSubNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Manage Admin</a></li>
              </ul>
            </li>

          <li id="userMainNav">
              <a href="<?php echo base_url('users') ?>">
                  <i class="fa fa-circle-o"></i> <span>Customers</span>
              </a>
          </li>




          <li class="treeview" id="productMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li id="createProductSubMenu"><a href="<?php echo base_url('products/create') ?>"><i class="fa fa-circle-o"></i> Add product</a></li>
                <li id="manageProductSubMenu"><a href="<?php echo base_url('products') ?>"><i class="fa fa-circle-o"></i> Manage Products</a></li>
              </ul>
            </li>


          <li id="categoryMainNav">
              <a href="<?php echo base_url('category') ?>">
                  <i class="fa fa-circle-o"></i> <span>Category</span>
              </a>
          </li>

          <li id="ordersMainNav">
              <a href="<?php echo base_url('order') ?>">
                  <i class="fa fa-circle-o"></i> <span>Orders</span>
              </a>
          </li>

          <li><a href="<?php echo base_url('adminauth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>