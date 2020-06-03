<?php 
      $active = 'Profile';
      include("includes/db_conn.php"); 
      include("includes/header.php"); ?>

	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="margin-bottom: 30px;">
          <a class="btn btn-lg btn-primary" href="#add" data-target="#addProfileModal" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-white"></i> Add New Company Profile</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
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
                  <th>Image</th>
                  <th>Name</th>
                  <th>Region</th>
                  <th>Location</th>
                  <th>Contact 1</th>
                  <th>Contact 2</th>
                  <th>Contact 3</th>
                  <th>Email 1</th>
                  <th>Email 2</th>
                  <th>Media Handles</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               		<?php

                    $sql = "SELECT * FROM company_profile ORDER BY profile_id";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));


                    if(mysqli_num_rows($query))
                    {
                        while($row = mysqli_fetch_array($query))
                        {

                  ?>
                    <tr>
                      <td><?php echo $row['profile_id'];  ?></td>
                      <td><?php echo $row['company_logo'];  ?></td>
                      <td><?php echo $row['company_name'];  ?></td>
                      <td><?php echo $row['company_region'];  ?></td>
                      <td><?php echo $row['company_location'];  ?></td>
                      <td><?php echo $row['contact_1'];  ?></td>
                      <td><?php echo $row['contact_2'];  ?></td>
                      <td><?php echo $row['contact_3'];  ?></td>
                      <td><?php echo $row['email_1'];  ?></td>
                      <td><?php echo $row['email_2'];  ?></td>
                      <td><?php echo $row['social_media_handles'];  ?></td>
                      <td>
                        <?php 

                        if($row['company_status'] == 'Active')
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
                        <!-- Update & Delete Modal Call -->
                        <a href="#update<?php echo $row['profile_id'];?>" data-target="#update<?php echo $row['profile_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

                         <a href="#delete<?php echo $row['profile_id'];?>" data-target="#delete<?php echo $row['profile_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
                         
                      </td>
                    </tr>
                   
                        <!-- Update Profile Modal -->      
      <div id="update<?php echo $row['profile_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Profiles Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="company_info_update.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">Company Name</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
                <input type="text" class="form-control" name="company_logo" value="<?php echo $row['company_logo'];?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Company Name</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
                <input type="text" class="form-control" name="company_name" value="<?php echo $row['company_name'];?>" required>  
              </div>
            </div> 



            <div class="form-group">
              <label class="control-label col-lg-3">Company Region</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="company_region" value="<?php echo $row['company_region'];?>" required>  
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-lg-3">Company Location</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="company_location" value="<?php echo $row['company_location'];?>" required>  
              </div>
            </div>  

            <div class="form-group">
              <label class="control-label col-lg-3">Contact 1</label>
              <div class="col-lg-9">
              <input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="contact_1" value="<?php echo $row['contact_1'];?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Contact 2</label>
              <div class="col-lg-9">
              <input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="contact_2" value="<?php echo $row['contact_2'];?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Contact 3</label>
              <div class="col-lg-9">
              <input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="contact_3" value="<?php echo $row['contact_3'];?>" required>  
              </div>
            </div> 



            <div class="form-group">
              <label class="control-label col-lg-3">Email 1</label>
              <div class="col-lg-9">
              <input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="email_1" value="<?php echo $row['email_1'];?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Email 2</label>
              <div class="col-lg-9">
              <input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="email_2" value="<?php echo $row['email_2'];?>" required>  
              </div>
            </div> 

             <div class="form-group">
              <label class="control-label col-lg-3">Media Handles</label>
              <div class="col-lg-9">
              <input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required>  
              <input type="text" class="form-control" name="media_handles" value="<?php echo $row['media_handles'];?>" required>  
              </div>
            </div> 
          
           
            <div class='form-group'>
              <label class='control-label col-lg-3'>Status</label>
              <div class='col-lg-9'>
                <select class='form-control' name='company_status' style='width: 100%;' required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Select company status')">
                  <option disabled selected>Select Company status</option>
                 <option value='Active'>Active</option>
                 <option value='Inactive'>Inactive</option>
              </select>
              </div>
            </div>  

                  </div><br><br><br><br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Company Details</button>
                  </div>
                 </form>
                  </div>
              </div><!--end of modal-dialog-->
       </div>
 <!--end of modal-->        


<!-- Delete Company Info Modal -->
 <div id="delete<?php echo $row['profile_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Company Details </h4>
              </div>
              <div class="modal-body">
              
              <form class="form-horizontal" method="post" action="company_info_del.php">
             
                  <input type="hidden" class="form-control" name="profile_id" value="<?php echo $row['profile_id'];?>" required> 
                      
                   <p>Are you sure you want to remove <?php echo $row['company_name']."?";  ?></p>
              
                    </div><br>

                    <div class="modal-footer">
                      <a href="delete<?php echo $row['profile_id']; ?>" style="color: #ffffff;">
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
                  <th>Image</th>
                  <th>Name</th>
                  <th>Region</th>
                  <th>Location</th>
                  <th>Contact 1</th>
                  <th>Contact 2</th>
                  <th>Contact 3</th>
                  <th>Email 1</th>
                  <th>Email 2</th>
                  <th>Media Handles</th>
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


              <!-- Add New Company Info Modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="addProfileModal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Company </h4>
      </div>
      <form class="form-horizontal" role="form" action="company_info_add.php" method="POST">
      <div class="modal-body"> 

        <div class="form-group">
        <label class="control-label col-sm-3">Image</label>
         <div class="col-sm-9">
          <input type="file" name="company_logo" class="form-control" placeholder="Upload Image" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Company Name</label>
         <div class="col-sm-9">
          <input type="text" name="company_name" class="form-control" placeholder="Company Name" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Region</label>
         <div class="col-sm-9">
          <input type="text" name="company_region" class="form-control" placeholder="Region" autocomplete="off" required>
        </div>
      </div>
  
      <div class="form-group">
        <label class="control-label col-sm-3">Location</label>
         <div class="col-sm-9">
          <input type="text" name="company_location" class="form-control" placeholder="Location" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Contact 1</label>
         <div class="col-sm-9">
          <input type="text" name="contact_1" class="form-control" placeholder="Phone Number" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Contact 2</label>
         <div class="col-sm-9">
          <input type="text" name="contact_1" class="form-control" placeholder="Phone Number" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Contact 3</label>
         <div class="col-sm-9">
          <input type="text" name="contact_3" class="form-control" placeholder="Phone Number" autocomplete="off" required>
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-3">Email 1</label>
         <div class="col-sm-9">
          <input type="text" name="email_1" class="form-control" placeholder="Email" autocomplete="off" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Email 2</label>
         <div class="col-sm-9">
          <input type="text" name="email_2" class="form-control" placeholder="Email" autocomplete="off" required>
        </div>
      </div>

        <div class="form-group">
          <label class="control-label col-lg-3">Social Media <br> (Note: Hold down Ctrl key to select multiple handles)</label>
          <div class="col-lg-9">
          <select multiple class="form-control" name="media[]" style="width: 100%;" required>
             <option value="facebook">Facebook</option>
             <option value="Twitter">Twitter</option>
             <option value="Instagram">Instagram</option>
             <option value="google-plus">Google-plus</option>
             <option value="linkedin">Linkedin</option>          
          </select>
          </div>
        </div>

      
          <div class="form-group">
          <label class="control-label col-lg-3">Status</label>
          <div class="col-lg-9">
            <select class="form-control" name="company_status" style="width: 100%;" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Select Company Status')">
             <option disabled selected>Select company status</option>
             <option value="Active">Active</option>
             <option value="Inactive">Inactive</option>
          </select>
          </div>
        </div>
        
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" name="submit">Add New Company</button>
    </div>
    </form>
    </div>
    </div>
   </div>


<?php include("includes/footer_links.php"); ?>


