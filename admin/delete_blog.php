<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 
    if(isset($_GET['delete_blog'])){
        
        $delete_id = $_GET['delete_blog'];
        $delete_blog = "delete from blog where blog_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_blog);
        
        if($run_delete){
            echo "<script>alert('The blog has been Deleted')</script>";
            echo "<script>window.open('index.php?view_blog','_self')</script>";
        }
    }

?>

<?php } ?>