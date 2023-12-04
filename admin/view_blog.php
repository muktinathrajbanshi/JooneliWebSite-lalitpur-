
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
                    <i class="fa fa-dashboard"></i> Dashboard / Blog table
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h3 class="panel-title">
                    Blog table
                </h3>
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                
                                <th> Blog Title </th>
                                <th> Blog Description</th>
                                <th> Blog image </th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                            <?php 
                                $i=0;
                                $get_blog = "select * from blog";
                                $run_blog = mysqli_query($con,$get_blog);

                                while($row_blog=mysqli_fetch_array($run_blog)){
                                    $blog_id = $row_blog['blog_id'];
                                    $blog_desc = $row_blog['blog_desc'];
                                    $blog_title = $row_blog['blog_title'];
                                    $blog_img = $row_blog['blog_img'];
                                    $i++;
                            ?>
                        
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $blog_title; ?> </td>
                                <td> <?php echo $blog_desc; ?> </td>                           
                                <td> <img src="admin_images/<?php echo $blog_img; ?>" width="100" height="80"></td>
                                
                                <td width="80px">         
                                    <a href="index.php?edit_blog=<?php echo $blog_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a> 
                                </td>
                                <td width="80px"> 
                                    <a href="index.php?delete_blog=<?php echo $blog_id; ?>">
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
<?php }?>