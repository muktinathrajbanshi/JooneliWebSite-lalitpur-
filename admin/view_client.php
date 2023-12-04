

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
                <i class="fa fa-dashboard"></i> Dashboard / Client table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
                  Client table
               </h3>
            </div>
            
            <div class="panel-body ">
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th> Client Logo </th>
                        <th width="100px">Delete</th>
                        
                    </tr>
                </thead>

                    <tbody>
                    
                    <?php 
                        $i=0;
                        $get_client = "select * from client";
                        $run_client = mysqli_query($con,$get_client);

                        while($row_client=mysqli_fetch_array($run_client)){
                            $client_id = $row_client['client_id'];
                            $client_img = $row_client['client_img'];
                            $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <img src="admin_images/<?php echo $client_img; ?>" width="80" height="80"></td>
                            <td>  
                                <a href="index.php?delete_client=<?php echo $client_id; ?>">
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