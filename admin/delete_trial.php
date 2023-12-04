<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_trial'])){
        
        $delete_id = $_GET['delete_trial'];
        
        $delete_trial = "delete from trial where trial_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_trial);
        
        if($run_delete){
            
            echo "<script>alert('The trial has been Deleted')</script>";
            echo "<script>window.open('index.php?view_trial','_self')</script>";
            
        }
        
    }

?>

<?php } ?>