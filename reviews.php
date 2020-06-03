<?php 
    
    $active = 'review';
    include("includes/db_conn.php"); 
    include("includes/header.php"); 

?>

	<!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reviews</li>
      </ol>
    </section><br><br>

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
                  <th>Customer Name</th>
                  <th>Phone Number</th>
                  <th>Company Branch</th>
                  <th>Product</th>
                  <th>Review message</th>
                  <th>Coupon Code</th>
                  <th>Rate</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               		<?php

                    $sql = "SELECT * FROM reviews";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));


                    if(mysqli_num_rows($query))
                    {
                        while($row = mysqli_fetch_array($query))
                        {

                  ?>

                    <tr>
                      <td><?php echo $row['review_id'];  ?></td>
                      <td><?php echo $row['customer_name'];  ?></td>
                      <td><?php echo $row['phone_number'];  ?></td>
                      <td><?php echo $row['company_branch'];  ?></td>
                      <td><?php echo $row['product'];  ?></td>
                      <td><?php echo $row['review_message'];  ?></td>
                      <td><?php echo $row['coupon_code'];  ?></td>
                      <td><?php echo $row['rate'];  ?></td>
                      <td>
                        <?php 

                        if($row['branch_status'] == 'Active')
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
                        <a href="#update<?php echo $row['branch_id'];?>" data-target="#update<?php echo $row['branch_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

                         <a href="#delete<?php echo $row['branch_id'];?>" data-target="#delete<?php echo $row['branch_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
                         
                      </td>
                    </tr>
                   
                        <!-- Update Branch Modal -->      
      <div id="update<?php echo $row['branch_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Branch Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="branches_update.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">Branch Name</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="branch_id" value="<?php echo $row['branch_id'];?>" required>  
                <input type="text" class="form-control" name="branch_name" value="<?php echo $row['branch_name'];?>" required>  
              </div>
            </div> 

            <div class="form-group">
              <label class="control-label col-lg-3">Branch Region</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="branch_id" value="<?php echo $row['branch_id'];?>" required>  
              <input type="text" class="form-control" name="branch_region" value="<?php echo $row['branch_region'];?>" required>  
              </div>
            </div>

            <div class='form-group'>
              <label class='control-label col-lg-3'>Status</label>
              <div class='col-lg-9'>
                <select class='form-control' name='branch_status' style='width: 100%;' required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Select branch status')">
                <option disabled selected>Select Branch Status</option>
                 <option value='Active'>Active</option>
                 <option value='Inactive'>Inactive</option>
              </select>
              </div>
            </div>  

                  </div><br><br><br><br><br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Branch</button>
                  </div>
                 </form>
                  </div>
              </div><!--end of modal-dialog-->
       </div>
 <!--end of modal-->        


<!-- Delete Branch Modal -->
 <div id="delete<?php echo $row['branch_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Branch </h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="post" action="branches_del.php">
             
                  <input type="hidden" class="form-control" name="branch_id" value="<?php echo $row['branch_id'];?>" required> 
                      
                   <p>Are you sure you want to remove <?php echo $row['branch_name']."?";  ?></p>
              
                    </div><br>
                    <div class="modal-footer">
                     
                      <a href="delete<?php echo $row['branch_id'];?>" style="color: #ffffff;">
                         <button type="submit" name="delete" class="btn btn-success">
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
                  <th>Customer Name</th>
                  <th>Phone Number</th>
                  <th>Company Branch</th>
                  <th>Product</th>
                  <th>Review message</th>
                  <th>Coupon Code</th>
                  <th>Rate</th>
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


              <!-- Add New Branch Modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="addBranchModal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Branch </h4>
      </div>
      <form class="form-horizontal" role="form" action="branches_add.php" method="POST">
      <div class="modal-body"> 

      <div class="form-group">
        <label class="control-label col-sm-3">Branch Name</label>
         <div class="col-sm-9">
          <input type="text" name="branch_name" class="form-control" placeholder="Branch Name" autocomplete="off" required>
        </div>
      </div>
   
      <div class="form-group">
        <label class="control-label col-sm-3">Branch Region</label>
         <div class="col-sm-9">
          <input type="text" name="branch_region" class="form-control" placeholder="Branch Region" autocomplete="off" required>
        </div>
      </div>

          <div class="form-group">
          <label class="control-label col-lg-3">Status</label>
          <div class="col-lg-9">
          <select class="form-control" name="branch_status" style="width: 100%;" required
           oninput="setCustomValidity('')" oninvalid="setCustomValidity('Select branch status')">
            <option disabled selected>Select Branch Status</option>
             <option value="Active">Active</option>
             <option value="Inactive">Inactive</option>
          </select>
          </div>
        </div>
        
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success" name="submit">Add Branch</button>
    </div>
    </form>
    </div>
    </div>
   </div>


<?php include("includes/footer_links.php"); ?>


