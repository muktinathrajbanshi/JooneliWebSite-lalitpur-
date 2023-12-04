
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
                <i class="fa fa-dashboard"></i> Dashboard / Management team table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               Management team table
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th> Name </th>
                                <th> Designation </th>
                                <th> Image </th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php 
                            $i=0;
                            $get_mgmt = "select * from mgmt_team";
                            $run_mgmt = mysqli_query($con,$get_mgmt);

                                while($row_mgmt=mysqli_fetch_array($run_mgmt)){
                                    $mgmt_id = $row_mgmt['mgmt_id'];
                                    $mgmt_name = $row_mgmt['mgmt_name'];
                                    $mgmt_designation = $row_mgmt['mgmt_designation'];
                                    $mgmt_image = $row_mgmt['mgmt_image'];
                                    $i++;
                            ?>
                        
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $mgmt_name; ?> </td>
                                <td> <?php echo $mgmt_designation; ?> </td>
                                <td> <img src="admin_images/<?php echo $mgmt_image; ?>" width="80" height="80"></td>
                                <td width="80px">  
                                    <a href="index.php?edit_team=<?php echo $mgmt_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>     
                                </td>
                                <td width="80px">  
                                    <a href="index.php?delete_team=<?php echo $mgmt_id; ?>">
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