<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_info'])){
        
            $edit_id = $_GET['edit_info'];
            $get_info = "select * from contact_info where info_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_info);
            $row_edit = mysqli_fetch_array($run_edit);
            $location = $row_edit['location'];
            $maill = $row_edit['maill'];
            $numb = $row_edit['numb'];
            $info_pass = $row_edit['info_pass'];
        }
    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Update Contact information
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Update Contact information 
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                          
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Location </label> 
                                <div class="col-md-6">
                                    <input name="location" type="text" class="form-control" required value="<?php echo $location; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Phone number </label> 
                                <div class="col-md-6">
                                    <input name="numb" type="text" class="form-control" required value="<?php echo $numb; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Email </label> 
                                <div class="col-md-6">
                                    <input name="maill" type="text" class="form-control" required value="<?php echo $maill; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Password </label> 
                                <div class="col-md-6">
                                    <input name="info_pass" type="text" class="form-control" required value="<?php echo $info_pass; ?>">
                                </div>
                            </div>
                  
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="update" value="Update information" type="submit" class="btn btn-primary form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php

if(isset($_POST['update'])){

    $location = $_POST['location'];
    $maill = $_POST['maill'];
    $numb = $_POST['numb'];
    $info_pass = $_POST['info_pass'];

     $update_info = "update contact_info set location='$location', numb='$numb', maill='$maill',  info_pass='$info_pass' where info_id='$edit_id'";
    
     $run_info = mysqli_query($con,$update_info);
    
     if($run_info){
        
         echo "<script>alert('Updated sucessfully')</script>";
         echo "<script>window.open('index.php?view_info','_self')</script>";
        
     }
}


} ?>