<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_team'])){
        
        $delete_id = $_GET['delete_team'];
        
        $delete_team = "delete from mgmt_team where mgmt_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_team);
        
        if($run_delete){
            echo "<script>alert('The team member has been deleted')</script>";
            echo "<script>window.open('index.php?view_team','_self')</script>";
        }
    }
?>

<?php } ?>