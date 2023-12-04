<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_img'])){
        
            $edit_id = $_GET['edit_img'];
            $get_img = "select image from bgimg where img_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_img);
            $row_edit = mysqli_fetch_array($run_edit);
            $image = $row_edit['image'];
            
        }

    ?>

       
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Edit Background Image
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        Edit Background Image
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                         
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Background image </label> 
                                <div class="col-md-6">
                                    <input name="image" type="file" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="update" value="Update Image" type="submit" class="btn btn-primary form-control">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    

        <?php
            if(isset($_POST['update'])){

                $image = $_FILES['image']['name'];
                $temp_name = $_FILES['image']['tmp_name'];
                move_uploaded_file($temp_name,"admin_images/$image");
                 $update_image = "update bgimg set image='$image' where img_id='$edit_id'";

                $run_image = mysqli_query($con,$update_image);
                
                if($run_image){
                    
                    echo "<script>alert('Background image updated sucessfully')</script>";
                    echo "<script>window.open('index.php?view_about','_self')</script>";
                    
                }
            }

        } ?>