<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_demo'])){
        
        $delete_id = $_GET['delete_demo'];
        
        $delete_demo = "delete from demo where demo_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_demo);
        
        if($run_delete){
            
            echo "<script>alert('The demo has been Deleted')</script>";
            echo "<script>window.open('index.php?view_demo','_self')</script>";
            
        }
        
    }

?>

<?php } ?>