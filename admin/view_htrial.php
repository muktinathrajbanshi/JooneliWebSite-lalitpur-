
<?php 

    include("includes/db.php");
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Trial table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                     Trial table
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <?php 
                            
                            $get_file = "select * from home_trial";
                            $run_file = mysqli_query($con,$get_file);
                            $row_file=mysqli_fetch_array($run_file);
                            $htrial_id=$row_file['htrial_id'];
                            $htrial_desc=$row_file['htrial_desc'];
                            $htrial_img=$row_file['htrial_img'];
                                 
                        ?>
    
                        <tr>
                            <th width="150px">Image</th>
                            <th> Description</th>
                            <th> Edit</th>
                                
                        </tr>

                    
                        <tr>
                        <td>
                                    <img src="admin_images/<?php echo $htrial_img; ?>" width="300px" height="150px">
                                </td>
                            <td><?php echo $htrial_desc ?></td>
                            
                                <td width="90px">         
                            <a href="index.php?edit_htrial=<?php echo $htrial_id; ?>">
                                    <i class="fa fa-pencil"></i> Edit  </a> 
                            </td>
                            
                        </tr>
                        
                    </table>                        
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php }?>