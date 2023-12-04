<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_job'])){
        
        $delete_id = $_GET['delete_job'];
        
        $delete_job = "delete from career where job_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_job);
        
        if($run_delete){
            
            echo "<script>alert('The job has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_job','_self')</script>";
            
        }
        
    }

?>

<?php } ?>