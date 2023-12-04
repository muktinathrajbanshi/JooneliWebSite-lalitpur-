
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
                <i class="fa fa-dashboard"></i> Dashboard / Trial request table
            </li>
        </ol>
    </div>
    </div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                     Trial request table
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                <thead>
                            <tr>
                                <th>S.N</th>
                                <th> Organization name </th>
                                <th> Your Name  </th>
                                <th> Designation</th>
                                <th > Email</th>
                                <th> Contact number</th>
                                <th> Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                     
                        <?php 
                            $i=0;
                            $get_trial = "select * from trial";
                            $run_trial = mysqli_query($con,$get_trial);

                            while($row_trial=mysqli_fetch_array($run_trial)){
                                $trial_id = $row_trial['trial_id'];
                                $org_name = $row_trial['org_name'];
                                $t_name = $row_trial['t_name'];
                                $t_designation = $row_trial['t_designation'];
                                $t_email=$row_trial['t_email'];
                                $t_contact=$row_trial['t_contact'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $org_name ?> </td>
                            <td> <?php echo $t_name ?> </td>
                            <td> <?php echo $t_designation ?> </td>
                            <td> <?php echo $t_email?> </td>
                            <td> <?php echo $t_contact ?> </td>
                            <td>  
                                <a href="index.php?delete_trial=<?php echo $trial_id; ?>">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>     
                            </td>
                        </tr>
                        <?php } ?>

                      
                      
                        </tbody>
                    </table>                        
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php }?>