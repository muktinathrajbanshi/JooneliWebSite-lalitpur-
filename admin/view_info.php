
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
                <i class="fa fa-dashboard"></i> Dashboard / Information table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                     Information table
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <?php 
                            
                            $get_file = "select * from contact_info";
                            $run_file = mysqli_query($con,$get_file);
                            $row_file=mysqli_fetch_array($run_file);
                            $info_id=$row_file['info_id'];
                            $location=$row_file['location'];
                            $maill=$row_file['maill'];
                            $numb=$row_file['numb'];
                            $info_pass=$row_file['info_pass'];
                                 
                        ?>
    
                        <tr>
                            <th >Location</th>
                            <th> Number</th>
                            <th> Mail</th>
                            <th> Password</th>
                            <th> Edit</th>
                                
                        </tr>

                    
                        <tr>
                            <td>
                                <?php echo $location; ?>
                            </td>
                            <td><?php echo $maill ?></td>
                            <td><?php echo $numb ?></td>
                            <td><?php echo $info_pass ?></td>
                                <td >         
                            <a href="index.php?edit_info=<?php echo $info_id; ?>">
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