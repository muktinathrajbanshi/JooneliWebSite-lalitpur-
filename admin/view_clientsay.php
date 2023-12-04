
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
                <i class="fa fa-dashboard"></i> Dashboard / Clients table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
                  Clients table
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th > Client photo </th>
                        <th> Client Name</th>
                        <th> Designation </th>
                        <th> Feedback </th>
                        <th> Edit </th>
                        <th> Delete </th>

                    </tr>
                </thead>

                <tbody>

                    <?php 
                        $i=0;
                        $get_clientsay = "select * from clientsay";
                        $run_clientsay = mysqli_query($con,$get_clientsay);

                        while($row_clientsay=mysqli_fetch_array($run_clientsay)){
                            $clients_id = $row_clientsay['clients_id'];
                            $clients_photo = $row_clientsay['clients_photo'];
                            $clients_name = $row_clientsay['clients_name'];
                            $clients_designation = $row_clientsay['clients_designation'];
                            $feedback = $row_clientsay['feedback'];
                            $i++;
                    ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <img src="admin_images/<?php echo $clients_photo; ?>" width="80" height="80"></td>
                            <td> <?php echo $clients_name; ?> </td>
                            <td> <?php echo $clients_designation; ?> </td>
                            <td> <?php echo $feedback; ?> </td>
                            <td width="80px">         
                            <a href="index.php?edit_clientsay=<?php echo $clients_id; ?>">
                             <i class="fa fa-pencil"></i> Edit
                            </a> 
                        </td>
                        <td width="80px"> 
                            <a href="index.php?delete_clientsay=<?php echo $clients_id; ?>">
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