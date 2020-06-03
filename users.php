<?php 
      $active = 'users';
      include("includes/db_conn.php"); 
      include("includes/header.php"); ?>

	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="margin-bottom: 30px;">
          <a class="btn btn-lg btn-primary"  href="#add" data-target="#addUserModal" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-white"></i> Add New User</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New user</li>
      </ol>
    </section>

     <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Role</th>
                  <th>Branch</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               		<?php

                    $sql = "SELECT * FROM users ORDER BY user_id";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));


                    if(mysqli_num_rows($query))
                    {
                        while($row = mysqli_fetch_array($query))
                        {

                  ?>

                    <tr>
                      <td><?php echo $row['user_id'];  ?></td>
                      <td><?php echo $row['firstname'];  ?></td>
                      <td><?php echo $row['lastname'];  ?></td>
                      <td><?php echo $row['email'];  ?></td>
                      <td><?php echo $row['contact'];  ?></td>
                      <td><?php echo $row['role'];  ?></td>
                      <td><?php echo $row['branch']; ?></td>
                      <td>
                        <?php 

                        if($row['user_status'] == 'Active')
                        {
                          echo "<span class='badge bg-green'>Active</span>";
                        }
                        else
                        {
                          echo "<span class='badge bg-red'>Inactive</span>";
                        }

                      ?>
                      </td>
                       <td>
                        
                        <a href="#update<?php echo $row['user_id'];?>" data-target="#update<?php echo $row['user_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

                         <a href="#delete<?php echo $row['user_id'];?>" data-target="#delete<?php echo $row['user_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
                         
                      </td>
                    </tr>
                   
                        <!-- Update User Modal -->      
      <div id="update<?php echo $row['user_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Member Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="users_update.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">First Name</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>" required>  
                <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'];?>" required>  
              </div>
            </div> 


              <div class="form-group">
              <label class="control-label col-lg-3">Last Name</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>" required>  
              <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'];?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Email</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>" required>  
              <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" required>  
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Contact</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>" required>  
              <input type="text" class="form-control" name="contact" value="<?php echo $row['contact'];?>" required>  
              </div>
            </div>  

            <div class="form-group">
              <label class="control-label col-lg-3">Role</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>" required>  
              <input type="text" class="form-control" name="role" value="<?php echo $row['role'];?>" required>  
              </div>
            </div> 

             <div class="form-group">
              <label class="control-label col-lg-3">Branch</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>" required>  
              <input type="text" class="form-control" name="branch" value="<?php echo $row['branch'];?>" required>  
              </div>
            </div> 
          
           
            <div class='form-group'>
              <label class='control-label col-lg-3'>Status</label>
              <div class='col-lg-9'>
                <select class='form-control' name='location_status' style='width: 100%;' required oninput="setCustomValidity('')" oninvalid ="setCustomValidity('Select user status')">
                  <option disabled selected>Select Status</option>
                  <option value='Active'>Active</option>
                  <option value='Inactive'>Inactive</option>
              </select>
              </div>
            </div>  

                  </div><br><br><br><br><br><br><br><br><br><br><br><br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Member</button>
                  </div>
                 </form>
                  </div>
              </div><!--end of modal-dialog-->
       </div>
 <!--end of modal-->        


<!-- Delete User Modal -->
 <div id="delete<?php echo $row['user_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Member Details</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="post" action="users_del.php">
             
                  <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>" required> 
                      
                      <p>Are you sure you want to remove <?php echo $row['firstname']." ".$row['lastname']."?"; ?></p>
              
                    </div><br>
                    <div class="modal-footer">
                    <a href="delete<?php echo $row['user_id'];?>" style="color: #ffffff;">
                      <button type="submit" name="delete" class="btn btn-primary">
                          Yes </button></a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
              </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>



                   
                  <?php } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Role</th>
                  <th>Branch</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

           </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

<?php include("includes/footer.php");?>


              <!-- Add New User Modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="addUserModal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Member </h4>
      </div>
      <form class="form-horizontal" role="form" action="users_add.php" method="POST">
      <div class="modal-body"> 

      <div class="form-group">
        <label class="control-label col-sm-3">First Name</label>
         <div class="col-sm-9">
          <input type="text" name="firstname" class="form-control" placeholder="First Name" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Last Name</label>
         <div class="col-sm-9">
          <input type="text" name="lastname" class="form-control" placeholder="Last Name" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Email</label>
         <div class="col-sm-9">
          <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Password</label>
         <div class="col-sm-9">
          <input type="password" name="password_1" class="form-control" placeholder="Password" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Confirm Password</label>
         <div class="col-sm-9">
          <input type="password" name="password_2" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Contact Number</label>
         <div class="col-sm-9">
          <input type="text" name="secretary" class="form-control" placeholder="Phone Number" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Role</label>
         <div class="col-sm-9">
          <input type="text" name="role" class="form-control" placeholder="Role" autocomplete="off" required>
        </div>
      </div>

       <div class="form-group">
        <label class="control-label col-sm-3">Branch</label>
         <div class="col-sm-9">
          <input type="text" name="branch" class="form-control" placeholder="Branch" autocomplete="off" required>
        </div>
      </div>

          <div class="form-group">
          <label class="control-label col-lg-3">Status</label>
          <div class="col-lg-9">
            <select class="form-control" name="user_status" style="width: 100%;" required oninput="setCustomValidity('')" oninvalid ="setCustomValidity('Select user status')">
              <option disabled selected>Select user status</option>
             <option value="Active">Active</option>
             <option value="Inactive">Inactive</option>
          </select>
          </div>
        </div>
        
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" name="submit">Add Member</button>
    </div>
    </form>
    </div>
    </div>
   </div>


<?php include("includes/footer_links.php"); ?>


