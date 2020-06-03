<?php 

       $active = 'review';
      include("includes/db_conn.php");
      include("includes/header.php"); 

?>

	<!-- Content Header (Page header) -->
  <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Send SMS</li>
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
              <form>
                <div class="col-md-6 form-group">
                  <label for="name">Customer Name</label>
                  <input type="text" name="customer_name" class="form-control" placeholder="Customer Name">
                </div>

                <div class="col-md-6 form-group">
                  <label for="contact">Phone Number</label>
                  <input type="text" name="phone" class="form-control" placeholder="Customer's Phone Number" required>
                </div>

                <div class="col-md-6 form-group">
                  <label for="review-link">Review link</label>
                  <input type="text" name="review_link" class="form-control" placeholder="Review link" required>
                </div>

                <div class="col-md-12 form-group">
                  <button type="submit" name="btn-review" class="btn btn-primary btn-lg">Send SMS</button>
                </div>
              </form>
               </div>
        </div>
        <!-- /.col -->
      </div>
    </div>
      <!-- /.row -->
    </section>

<?php include("includes/footer.php");?>
  

<?php include("includes/footer_links.php"); ?>


