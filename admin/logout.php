<?php 
//session_save_path('/home2/luldmiqd/sess'); in server.
    session_start();
    session_destroy();

    echo "<script>window.open('login.php','_self')</script>";

?>