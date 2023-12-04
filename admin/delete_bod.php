<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 
    if(isset($_GET['delete_bod'])){
        
        $delete_id = $_GET['delete_bod'];
        $delete_bod = "delete from bod where bod_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_bod);
        
        if($run_delete){
            echo "<script>alert('The bod has been Deleted')</script>";
            echo "<script>window.open('index.php?view_bod','_self')</script>";
        }
    }

?>

<?php } ?>