<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
    include("includes/db.php");

    ?>

       
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Insert Client
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                             Insert Client 
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                         
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Insert Client Logo </label> 
                                <div class="col-md-6">
                                    <input name="client_img" type="file" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="submit" value="Insert Client" type="submit" class="btn btn-primary form-control">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    

        <?php
            if(isset($_POST['submit'])){

                $client_img = $_FILES['client_img']['name'];
                $temp_name = $_FILES['client_img']['tmp_name'];
                move_uploaded_file($temp_name,"admin_images/$client_img");
                $insert_client = "insert into client (client_img) values ('$client_img')";
                
                $run_client = mysqli_query($con,$insert_client);
                
                if($run_client){
                    
                    echo "<script>alert('Client inserted sucessfully')</script>";
                    echo "<script>window.open('index.php?view_client','_self')</script>";
                    
                }
            }

        } ?>