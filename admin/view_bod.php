
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
                <i class="fa fa-dashboard"></i> Dashboard / Board of Director table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               Board of Director table
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th> BOD name </th>
                            <th> BOD designation </th>
                            <th> BOD image </th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                        $i=0;
                        $get_bod = "select * from bod";
                        $run_bod = mysqli_query($con,$get_bod);

                            while($row_bod=mysqli_fetch_array($run_bod)){
                                $bod_id = $row_bod['bod_id'];
                                $bod_name = $row_bod['bod_name'];
                                $bod_img = $row_bod['bod_img'];
                                $bod_designation = $row_bod['bod_designation'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $bod_name; ?> </td>
                            <td> <?php echo $bod_designation; ?> </td>
                            <td> <img src="admin_images/<?php echo $bod_img; ?>" width="80" height="80"></td>
                            <td width="80px">  
                                <a href="index.php?edit_bod=<?php echo $bod_id; ?>">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>     
                            </td>
                            <td width="80px">  
                                <a href="index.php?delete_bod=<?php echo $bod_id; ?>">
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