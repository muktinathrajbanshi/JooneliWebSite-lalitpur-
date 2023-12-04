
<?php    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";

        $get_product = "select * from product";
        $run_product = mysqli_query($con,$get_product); 
        
    }else{ ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Dashboard </h1>
        
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    
                    Inbox table
                    
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Subject</th>
                                <th> Message</th>
 
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                            $i=0;
                            $get_contact = "select * from contact order by 1 DESC LIMIT 0,3";
                            $run_contact = mysqli_query($con,$get_contact);

                            while($row_contact=mysqli_fetch_array($run_contact)){
                                $contact_id = $row_contact['contact_id'];
                                $contact_name = $row_contact['contact_name'];
                                $contact_email = $row_contact['contact_email'];
                                $subject=$row_contact['subject'];
                                $contact_message = $row_contact['contact_message'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $contact_name; ?> </td>
                            <td> <?php echo $contact_email ?> </td>
                            <td> <?php echo $subject ?> </td>
                            <td> <?php echo $contact_message ?> </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_contact">
                        View all inboxes <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>  
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
                 Footer Inbox table
               </h3> 
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th> Email </th>
                                <th> Message</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $i=0;
                            $get_fcontact = "select * from footer_contact order by 1 DESC LIMIT 0,3";
                            $run_fcontact = mysqli_query($con,$get_fcontact);

                            while($row_fcontact=mysqli_fetch_array($run_fcontact)){
                                $fcontact_id = $row_fcontact['fcontact_id'];
                                $fcontact_email = $row_fcontact['fcontact_email'];
                                $fcontact_message = $row_fcontact['fcontact_message'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $fcontact_email ?> </td>
                            <td> <?php echo $fcontact_message ?> </td>
                        </tr>
                        <?php } ?>
    
                        </tbody>
                    </table>                        
                    <div class="text-right">
                        <a href="index.php?view_contact">
                            View all requests <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    
                    Demo request table
                    
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th> Organization name </th>
                                <th> Your Name  </th>
                                <th> Designation</th>
                                <th> Email</th>
                                <th> Contact number</th>
 
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                            $i=0;
                            $get_demo = "select * from demo order by 1 DESC LIMIT 0,3";
                            $run_demo = mysqli_query($con,$get_demo);

                            while($row_demo=mysqli_fetch_array($run_demo)){
                                $demo_id = $row_demo['demo_id'];
                                $orgname = $row_demo['orgname'];
                                $d_name = $row_demo['d_name'];
                                $d_designation = $row_demo['d_designation'];
                                $d_email=$row_demo['d_email'];
                                $d_contact=$row_demo['d_contact'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $orgname ?> </td>
                            <td> <?php echo $d_name ?> </td>
                            <td> <?php echo $d_designation ?> </td>
                            <td> <?php echo $d_email?> </td>
                            <td> <?php echo $d_contact ?> </td>
                        </tr>
                        <?php } ?>
                     
                      
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_demo">
                        View all requests <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>  
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    
                    Trial request table
                    
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th> Organization name </th>
                                <th> Your Name  </th>
                                <th> Designation</th>
                                <th> Email</th>
                                <th> Contact number</th>
 
                            </tr>
                        </thead>

                        <tbody>

                        <?php 
                            $i=0;
                            $get_trial = "select * from trial order by 1 DESC LIMIT 0,3";
                            $run_trial = mysqli_query($con,$get_trial);

                            while($row_trial=mysqli_fetch_array($run_trial)){
                                $trial_id = $row_trial['trial_id'];
                                $org_name = $row_trial['org_name'];
                                $t_name = $row_trial['t_name'];
                                $t_designation = $row_trial['t_designation'];
                                $t_email=$row_trial['t_email'];
                                $t_contact=$row_trial['t_contact'];
                                $i++;
                        ?>
                    
                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $org_name ?> </td>
                            <td> <?php echo $t_name ?> </td>
                            <td> <?php echo $t_designation ?> </td>
                            <td> <?php echo $t_email?> </td>
                            <td> <?php echo $t_contact ?> </td>
                        </tr>
                        <?php } ?>
                      
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_trial">
                        View all requests <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>  
            </div>
        </div>
    </div>
</div>




<?php } ?>