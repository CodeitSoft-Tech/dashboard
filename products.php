<?php 
    
    $active = 'product';
    include("includes/db_conn.php"); 
    include("includes/header.php"); 
?>

	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="margin-bottom: 30px;">
          <a class="btn btn-lg btn-primary" href="#add" data-target="#addProductModal" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-white"></i> Add New Product</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
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
                  <th>Product Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               		<?php

                    $sql = "SELECT * FROM products ORDER BY product_name";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));


                    if(mysqli_num_rows($query))
                    {
                        while($row = mysqli_fetch_array($query))
                        {

                  ?>

                    <tr>
                      <td><?php echo $row['product_id'];  ?></td>
                      <td><?php echo $row['product_name'];  ?></td>
                      <td>
                        <?php 

                        if($row['product_status'] == 'Active')
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
                        <a href="#update<?php echo $row['product_id'];?>" data-target="#update<?php echo $row['product_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

                         <a href="#delete<?php echo $row['product_id'];?>" data-target="#delete<?php echo $row['product_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
                         
                      </td>
                    </tr>
                   
      <!-- Update Product Modal -->      
      <div id="update<?php echo $row['product_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Product Details</h4>
              </div>
              <div class="modal-body">

            <form class="form-horizontal" method="post" action="products_update.php" enctype='multipart/form-data'>
                    
            <div class="form-group">
              <label class="control-label col-lg-3">Product Name</label>
              <div class="col-lg-9"><input type="hidden" class="form-control" name="product_id" value="<?php echo $row['product_id'];?>" required>  
                <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name'];?>" required>  
              </div>

           
            <div class='form-group'>
              <label class='control-label col-lg-3'>Status</label>
              <div class='col-lg-9'>
                <select class='form-control' name='product_status' style='width: 100%;' required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Select product status')">
                 <option disabled selected>Select product status</option>
                 <option value='Active'>Active</option>
                 <option value='Inactive'>Inactive</option>
              </select>
              </div>
            </div>  

                  </div><br><br><br><br><br>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                 </form>
                  </div>
              </div><!--end of modal-dialog-->
       </div>
     </div>
 <!--end of modal-->        


<!-- Delete Product Modal -->
 <div id="delete<?php echo $row['product_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Product </h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="post" action="products_del.php">
             
                  <input type="hidden" class="form-control" name="product_id" value="<?php echo $row['product_id'];?>" required> 
                      
                   <p>Are you sure you want to remove <?php echo $row['product_name']."?";  ?></p>
              
                    </div><br>
                    <div class="modal-footer">
                     
                      <a href="delete<?php echo $row['product_id'];?>" style="color: #ffffff;">
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
                  <th>Product Name</th>
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


              <!-- Add New Product Modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="addProductModal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Product </h4>
      </div>
      <form class="form-horizontal" role="form" action="products_add.php" method="POST">
      <div class="modal-body"> 

      <div class="form-group">
        <label class="control-label col-sm-3">Product Name</label>
         <div class="col-sm-9">
          <input type="text" name="product_name" class="form-control" placeholder="Product Name" autocomplete="off" required>
        </div>
      </div>

         
          <div class="form-group">
          <label class="control-label col-lg-3">Status</label>
          <div class="col-lg-9">
            <select class="form-control" name="product_status" style="width: 100%;" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Select product status')">
              <option disabled selected>Select product status</option>
             <option value="Active">Active</option>
             <option value="Inactive">Inactive</option>
          </select>
          </div>
        </div>
        
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </form>
    </div>
    </div>
   </div>


<?php include("includes/footer_links.php"); ?>


