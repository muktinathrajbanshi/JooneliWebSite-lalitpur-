<?php 
//session_save_path('/home2/luldmiqd/sess'); in server.
    session_start();
    include("includes/db.php");

    if(isset($_POST['admin_login'])){
        
        $admin_name = mysqli_real_escape_string($con,$_POST['admin_name']);
        
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        
        $get_admin = "select * from admins where admin_name='$admin_name' AND admin_pass='$admin_pass'";
        
        $run_admin = mysqli_query($con,$get_admin);

         $count = mysqli_num_rows($run_admin);
        
         if($count==1){
            
             $_SESSION['admin_name']=$admin_name;
            
             echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
         }else{
            
          echo "<script>alert('name or Password is Wrong !')</script>";
            
         }
        
    }

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="../images/Logo.jpg">

    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Admin Name" name="admin_name" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required id="passw">

           <input type="checkbox" onclick="showPass()"> &nbsp; Show Password
            <br /> <br />
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
   <script>
            function showPass() {
                var x = document.getElementById("passw");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
            }
            </script>
    
</body>
</html>


