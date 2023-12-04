<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_contact'])){
        
        $delete_id = $_GET['delete_contact'];
        
        $delete_contact = "delete from contact where contact_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_contact);
        
        if($run_delete){
            
            echo "<script>alert('The contact has been Deleted')</script>";
            echo "<script>window.open('index.php?view_contact','_self')</script>";
            
        }
        
    }

?>

<?php } ?>