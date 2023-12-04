<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_client'])){
        
        $delete_id = $_GET['delete_client'];
        
        $delete_client = "delete from client where client_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_client);
        
        if($run_delete){
            
            echo "<script>alert('The client has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_client','_self')</script>";
            
        }
        
    }

?>

<?php } ?>