<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_bg'])){
        
            $edit_id = $_GET['edit_bg'];
            $get_video = "select video from filee where file_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_video);
            $row_edit = mysqli_fetch_array($run_edit);
            $video = $row_edit['video'];
            
        }

    ?>

       
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Edit Background Video
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        Edit Background Video
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                         
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Video </label> 
                                <div class="col-md-6">
                                    <input name="video" type="file" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="submit" value="Update Video" type="submit" class="btn btn-primary form-control">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    

        <?php
            if(isset($_POST['submit'])){

                $video = $_FILES['video']['name'];
                $temp_name = $_FILES['video']['tmp_name'];
                move_uploaded_file($temp_name,"admin_images/$video");
                $update_video = "update filee set video='$video' where file_id='$edit_id'";
                
                $run_video = mysqli_query($con,$update_video);
                
                if($run_video){
                    
                    echo "<script>alert('Video updated sucessfully')</script>";
                    echo "<script>window.open('index.php?view_about','_self')</script>";
                    
                }
            }

        } ?>