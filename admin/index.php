
<?php 
    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        $admin_session = $_SESSION['admin_name'];
        $get_admin = "select * from admins where admin_name='$admin_session'";
        $run_admin = mysqli_query($con,$get_admin);
        $row_admin=mysqli_fetch_array($run_admin);
        $admin_id = $row_admin['admin_id'];
        $admin_name = $row_admin['admin_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jooneli </title>
    <link rel="icon" href="../images/Logo.jpg">
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper">
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper">
            <div class="container-fluid">
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        include("dashboard.php");
                    }    
                    if(isset($_GET['view_contact'])){
                            
                        include("view_contact.php");   
                    }
                    if(isset($_GET['delete_contact'])){
                            
                        include("delete_contact.php");   
                    }
                    if(isset($_GET['delete_fcontact'])){
                            
                        include("delete_fcontact.php");   
                    }
                    if(isset($_GET['view_demo'])){
                            
                        include("view_demo.php");   
                    } 
                    if(isset($_GET['delete_demo'])){
                            
                        include("delete_demo.php");   
                    } 
                    if(isset($_GET['view_trial'])){
                            
                        include("view_trial.php");   
                    }
                    if(isset($_GET['delete_trial'])){
                            
                        include("delete_trial.php");   
                    }  
                    if(isset($_GET['insert_product'])){
                            
                        include("insert_product.php");   
                    } 
                    if(isset($_GET['view_product'])){
                            
                        include("view_product.php");   
                    } 
                    if(isset($_GET['edit_product'])){
                            
                        include("edit_product.php");   
                    } 
                    if(isset($_GET['delete_product'])){
                            
                        include("delete_product.php");   
                    } 
                    if(isset($_GET['edit_product1'])){
                            
                        include("edit_product1.php");   
                    } 
                    if(isset($_GET['delete_product1'])){
                            
                        include("delete_product1.php");   
                    } 
                    if(isset($_GET['view_about'])){
                            
                        include("view_about.php");   
                    }  
                    if(isset($_GET['edit_about'])){
                            
                        include("edit_about.php");   
                    }  
                    if(isset($_GET['edit_mission'])){
                            
                        include("edit_mission.php");   
                    } 
                    if(isset($_GET['edit_value'])){
                            
                        include("edit_value.php");   
                    } 
                    if(isset($_GET['insert_job'])){
                            
                        include("insert_job.php");   
                    } 
                    if(isset($_GET['view_job'])){
                            
                        include("view_job.php");   
                    }
                    if(isset($_GET['edit_job'])){
                            
                        include("edit_job.php");   
                    }
                    if(isset($_GET['delete_job'])){
                            
                        include("delete_job.php");   
                    }
                    if(isset($_GET['insert_clientsay'])){
                            
                        include("insert_clientsay.php");   
                    } 
                    if(isset($_GET['view_clientsay'])){
                            
                        include("view_clientsay.php");   
                    }
                    if(isset($_GET['edit_clientsay'])){
                            
                        include("edit_clientsay.php");   
                    }
                    if(isset($_GET['delete_clientsay'])){
                            
                        include("delete_clientsay.php");   
                    }
                    if(isset($_GET['insert_client'])){
                            
                        include("insert_client.php");   
                    } 
                    if(isset($_GET['view_client'])){
                            
                        include("view_client.php");   
                    } 
                    if(isset($_GET['delete_client'])){
                            
                        include("delete_client.php");   
                    }
                                   
                    if(isset($_GET['edit_bg'])){
                            
                        include("edit_bg.php");   
                    }
                    if(isset($_GET['edit_img'])){
                            
                        include("edit_img.php");   
                    }
                    if(isset($_GET['view_htrial'])){
                            
                        include("view_htrial.php");   
                    }
                    if(isset($_GET['edit_htrial'])){
                            
                        include("edit_htrial.php");   
                    }
                    if(isset($_GET['view_info'])){
                            
                        include("view_info.php");   
                    }
                    if(isset($_GET['edit_info'])){
                            
                        include("edit_info.php");   
                    }
                    if(isset($_GET['insert_bod'])){
                            
                        include("insert_bod.php");   
                    } 
                    if(isset($_GET['view_bod'])){
                            
                        include("view_bod.php");   
                    } 
                    if(isset($_GET['edit_bod'])){
                            
                        include("edit_bod.php");   
                    } 
                    if(isset($_GET['delete_bod'])){
                            
                        include("delete_bod.php");   
                    }

                    if(isset($_GET['insert_team'])){
                            
                        include("insert_team.php");   
                    } 
                    if(isset($_GET['view_team'])){
                            
                        include("view_team.php");   
                    } 
                    if(isset($_GET['edit_team'])){
                            
                        include("edit_team.php");   
                    } 
                    if(isset($_GET['delete_team'])){
                
                        include("delete_team.php");   
                    }

                    if(isset($_GET['insert_blog'])){
                            
                        include("insert_blog.php");   
                    } 
                    if(isset($_GET['view_blog'])){
                            
                        include("view_blog.php");   
                    } 
                    if(isset($_GET['edit_blog'])){
                            
                        include("edit_blog.php");   
                    } 
                    if(isset($_GET['delete_blog'])){
                
                        include("delete_blog.php");   
                    }
                ?>

            </div>
        </div>
    </div>

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>       
</body>
</html>


<?php 
mysqli_close($con); } ?>
<!-- session_save_path('/tmp'); -->