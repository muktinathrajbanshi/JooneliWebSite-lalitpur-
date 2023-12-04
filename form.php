<?php
    include("admin/includes/db.php");

if(isset($_POST['tsubmit'])){
    
    $org_name = $_POST['org_name'];
    $t_name = $_POST['t_name'];
    $t_designation = $_POST['t_designation'];
    $t_email = $_POST['t_email'];
    $t_contact = $_POST['t_contact'];

    $insert_trial = "insert into trial (org_name,t_name,t_designation,t_email,t_contact) values ('$org_name','$t_name','$t_designation','$t_email','$t_contact')";
    
    $run_trial = mysqli_query($con,$insert_trial);
    
    if($run_trial){
        echo "<script>alert('Form Submitted')</script>";
        
    }
  
    

    $html="
    <table><tr><td>Ogranization Name</td> <td>$org_name</td></tr>
        <tr><td>Customer Name</td><td>$t_name</td></tr>
        <tr><td>Designation</td><td>$t_designation</td></tr>
        <tr><td>Email</td><td>$t_email</td></tr>
        <tr><td>Contact number</td><td>$t_contact</td></tr>
        </table>";

        $get_trial = "select * from contact_info";
        $run_trial = mysqli_query($con,$get_trial);

        $row_trial=mysqli_fetch_array($run_trial);
        $maill = $row_trial['maill'];
        $info_pass = $row_trial['info_pass'];
         
        include('smtp/PHPMailerAutoload.php');
       
        $mail=new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->Port=587;
        $mail->SMTPSecure="tls";
        $mail->SMTPAuth=true;
        $mail->Username=$maill; //sender
        $mail->Password=$info_pass;  //sender
        $mail->SetFrom($maill); //sender
        $mail->addAddress("$maill"); //receiver
        $mail->IsHTML(true);
        $mail->Subject="Start Free Trial request";
        $mail->Body=$html;
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if($mail->send()){
            echo "<script>window.open('trial.html','_self')</script>";
        }   
}
?>


<?php

if(isset($_POST['dsubmit'])){
    
    $orgname = $_POST['orgname'];
    $d_name = $_POST['d_name'];
    $d_designation = $_POST['d_designation'];
    $d_email = $_POST['d_email'];
    $d_contact = $_POST['d_contact'];

    $insert_demo = "insert into demo (orgname,d_name,d_designation,d_email,d_contact) values ('$orgname','$d_name','$d_designation','$d_email','$d_contact')";
    
    $run_demo = mysqli_query($con,$insert_demo);
    
    if($run_demo){
        echo "<script>alert('Form Submitted')</script>";
    }

    $html="
    <table><tr><td>Ogranization Name</td> <td>$orgname</td></tr>
        <tr><td>Customer Name</td><td>$d_name</td></tr>
        <tr><td>Designation</td><td>$d_designation</td></tr>
        <tr><td>Email</td><td>$d_email</td></tr>
        <tr><td>Contact number</td><td>$d_contact</td></tr>
        </table>";
 
        $get_trial = "select * from contact_info";
        $run_trial = mysqli_query($con,$get_trial);

        $row_trial=mysqli_fetch_array($run_trial);
        $maill = $row_trial['maill'];
        $info_pass = $row_trial['info_pass'];


        include('smtp/PHPMailerAutoload.php');
        $mail=new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->Port=587;
        $mail->SMTPSecure="tls";
        $mail->SMTPAuth=true;
        $mail->Username=$maill; //sender
        $mail->Password=$info_pass;  //sender
        $mail->SetFrom($maill); //sender
        $mail->addAddress("$maill"); //receiver
        $mail->IsHTML(true);
        $mail->Subject="Watch Demo Request";
        $mail->Body=$html;
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
      
        if($mail->send()){
            echo "<script>window.open('demo.html','_self')</script>";
        } 
}
?>

<?php

if(isset($_POST['fsubmit'])){
    
    $fcontact_email = $_POST['fcontact_email'];
    $fcontact_message = $_POST['fcontact_message'];

    $insert_fcontact = "insert into footer_contact (fcontact_email,fcontact_message) values ('$fcontact_email','$fcontact_message')";
    
    $run_fcontact = mysqli_query($con,$insert_fcontact);
    
    if($run_fcontact){
        echo "<script>alert('Message sent, We will contact you soon.')</script>";
        echo "<script>window.open('index.html','_self')</script>";
    }
}
?>

<?php
if(isset($_POST['csubmit'])){
    
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $subject = $_POST['subject'];
    $contact_message = $_POST['contact_message'];

    $insert_contact = "insert into contact (contact_name,contact_email,subject,contact_message) values ('$contact_name','$contact_email','$subject','$contact_message')";
    
    $run_contact = mysqli_query($con,$insert_contact);
    
    if($run_contact){
        echo "<script>alert('Message sent, We will contact you soon.')</script>";
        echo "<script>window.open('index.html','_self')</script>";
    }
} 
?>







