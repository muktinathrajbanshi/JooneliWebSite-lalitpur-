<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_clientsay'])){
        
        $delete_id = $_GET['delete_clientsay'];
        
        $delete_client = "delete from clientsay where clients_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_client);
        
        if($run_delete){
            
            echo "<script>alert('The client has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_clientsay','_self')</script>";
            
        }
        
    }

?>

<?php } ?>