
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
                <i class="fa fa-dashboard"></i> Dashboard / Career table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
                  Career table
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th> Position</th>
                                <th width="80px"> Time </th>
                                <th> Opening </th>
                                <th> Type </th>
                                <th> Salary </th>
                                <th width="100px"> Date Line </th>
                                <th> Responsibilities</th>
                                <th>Qualifications </th>
                                <th width="60px">Edit</th>
                                <th width="80px">Delete</th>
                               
                            </tr>
                        </thead>

                        <tbody>
                     
                        <?php 
                            $i=0;
                            $get_career = "select * from career";
                            $run_career = mysqli_query($con,$get_career);

                            while($row_career=mysqli_fetch_array($run_career)){
                                $job_id = $row_career['job_id'];
                                $position = $row_career['position'];
                                $time = $row_career['time'];
                                $opening = $row_career['opening'];
                                
                                $category = $row_career['category'];

                                $salary = $row_career['salary'];
                                $deadline = $row_career['deadline'];
                                $responsible = $row_career['responsible'];
                                $qualification = $row_career['qualification'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $position; ?> </td>
                            <td> <?php echo $time; ?> </td>
                            <td> <?php echo $opening; ?> </td>
                            <td> <?php echo $category; ?> </td>
                            <td> <?php echo $salary; ?> </td>
                            <td> <?php echo $deadline; ?> </td>
                            <td> <?php echo $responsible; ?> </td>
                            <td> <?php echo $qualification; ?> </td>
                            <td width="80px">         
                            <a href="index.php?edit_job=<?php echo $job_id; ?>">
                             <i class="fa fa-pencil"></i> Edit
                            </a> 
                        </td>
                        <td width="80px"> 
                            <a href="index.php?delete_job=<?php echo $job_id; ?>">
                             <i class="fa fa-trash-o "></i> Delete
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