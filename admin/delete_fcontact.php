<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_fcontact'])){
        
        $delete_id = $_GET['delete_fcontact'];
        
        $delete_fcontact = "delete from footer_contact where fcontact_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_fcontact);
        
        if($run_delete){
            
            echo "<script>alert('The message has been Deleted')</script>";
            echo "<script>window.open('index.php?view_contact','_self')</script>";
            
        }
        
    }

?>

<?php } ?>