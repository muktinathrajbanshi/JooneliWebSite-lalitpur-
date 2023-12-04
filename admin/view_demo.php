
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
                <i class="fa fa-dashboard"></i> Dashboard / Demo request table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                     Demo request table
                
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
                            <th> Email</th>
                            <th> Contact number</th>
                            <th> Delete</th>
                        </tr>
                    </thead>
                        
                        <tbody>
                       
                        <?php 
                            $i=0;
                            $get_demo = "select * from demo ";
                            $run_demo = mysqli_query($con,$get_demo);

                            while($row_demo=mysqli_fetch_array($run_demo)){
                                $demo_id = $row_demo['demo_id'];
                                $orgname = $row_demo['orgname'];
                                $d_name = $row_demo['d_name'];
                                $d_designation = $row_demo['d_designation'];
                                $d_email=$row_demo['d_email'];
                                $d_contact=$row_demo['d_contact'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $orgname ?> </td>
                            <td> <?php echo $d_name ?> </td>
                            <td> <?php echo $d_designation ?> </td>
                            <td> <?php echo $d_email?> </td>
                            <td> <?php echo $d_contact ?> </td>
                            <td>  
                                <a href="index.php?delete_demo=<?php echo $demo_id; ?>">
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