
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
                <i class="fa fa-dashboard"></i> Dashboard / About table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                     About table
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <?php 
                            
                            $get_file = "select * from filee";
                            $run_file = mysqli_query($con,$get_file);
                            $row_file=mysqli_fetch_array($run_file);
                            $file_id=$row_file['file_id'];
                            $video = $row_file['video'];     
                        ?>
                        <tr>
                            <th width="150px">Background video</th>
                                <td>
                                    <video src="admin_images/<?php echo $video; ?>" autoplay muted loop width="300px" height="150px"></video>
                                </td>
                                <td width="90px">         
                                    <a href="index.php?edit_bg=<?php echo $file_id; ?>">  
                                        <i class="fa fa-pencil"></i> Change  </a> 
                                </td>
                        </tr>

                        <?php 
                            
                            $get_image = "select * from bgimg";
                            $run_image = mysqli_query($con,$get_image);
                            $row_image=mysqli_fetch_array($run_image);
                            $img_id=$row_image['img_id'];
                            $image = $row_image['image'];     
                        ?>
                        <tr>
                            <th width="150px">Background image</th>
                                <td>
                                    <img src="admin_images/<?php echo $image; ?>" width="300px" height="150px">
                                </td>
                                <td width="90px">         
                                    <a href="index.php?edit_img=<?php echo $img_id; ?>">  
                                        <i class="fa fa-pencil"></i> Change  </a> 
                                </td>
                        </tr>

                        <?php 
                            
                            $get_about = "select * from about";
                            $run_about = mysqli_query($con,$get_about);
                            $row_about=mysqli_fetch_array($run_about);
                            $about_id=$row_about['about_id'];
                            $about = $row_about['about'];
                            $mission = $row_about['mission'];
                            $value = $row_about['value'];
                                
                        ?>
                    
                        <tr>
                            <th>About description</th>
                            <td><?php echo $about ?></td>
                            <td width="90px">         
                            <a href="index.php?edit_about=<?php echo $about_id; ?>">
                                    <i class="fa fa-pencil"></i> Edit  </a> 
                            </td>
                        </tr>
                            
                        <tr>
                            <th>Mission</th>
                            <td><?php echo $mission ?>  </td>
                            <td width="90px">         
                                <a href="index.php?edit_mission=<?php echo $about_id; ?>">
                                    <i class="fa fa-pencil"></i> Edit 
                                </a> 
                            </td>
                        </tr>

                        <tr>
                            <th>Values</th>
                            <td><?php echo $value  ?> </td>
                            <td width="90px">         
                                <a href="index.php?edit_value=<?php echo $about_id; ?>">
                                    <i class="fa fa-pencil"></i>   Edit
                                </a> 
                            </td>
                        </tr>
                    </table>                        
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php }?>