 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
        <li class="menu-open <?php if($active == 'Dashboard') echo"active"; ?>">
          <a href="index.php">
            <i style="color: #fff; margin-right: 9px;" class="fa fa-dashboard fa-lg"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="<?php if($active == 'users') echo"active"; ?>">
          <a href="users.php">
            <i style="color: #fff; margin-right: 9px;" class="fa fa-users fa-lg"></i> <span>Manage Users</span>
          </a>
        </li>

         <li class="<?php if($active == 'Profile') echo"active"; ?>">
          <a href="company_info.php">
            <i style="color: #fff; margin-right: 9px;" class="fa fa-edit fa-lg"></i> <span>Company Profile</span>
          </a>
        </li>

          <li class="<?php if($active == 'Branches') echo"active"; ?>">
          <a href="branches.php">
            <i style="color: #fff; margin-right: 9px;" class="fa fa-building-o fa-lg"></i> <span>Branches</span>
          </a>
        </li>

         <li class="<?php if($active == 'product') echo"active"; ?>">
          <a href="products.php">
            <i style="color: #fff; margin-right: 9px;" class="fa fa-cubes fa-lg"></i> <span>Products</span>
          </a>
        </li>

         <li class="treeview <?php if($active == 'review') echo"active"; ?>">
          <a href="#">
            <i style="color: #fff; margin-right: 9px;" class="fa fa-calendar-check-o fa-lg"></i>  <span>Reviews</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="reviews.php"><i class="fa fa-circle-o"></i> Reviews
              </a>
            </li>

            <li>
              <a href="send_sms.php"><i class="fa fa-circle-o"></i> Send review Link (SMS)</a>
            </li>

             <li>
              <a href="review_sms.php"><i class="fa fa-circle-o"></i> Review SMS
              </a>
            </li>

             <li>
              <a href="failed_sms.php"><i class="fa fa-circle-o"></i> Failed SMS
              </a>
            </li>

            <li>
              <a href="redeem_coupon.php"><i class="fa fa-circle-o"></i> Redeem Coupon
              </a>
            </li>

          </ul>
        </li>
    <!-- /.sidebar -->
  </aside>