
<?php 

    include("includes/db.php");
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Inbox table
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
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                     
                        <?php 
                            $i=0;
                            $get_contact = "select * from contact";
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
                            <td>  
                                <a href="index.php?delete_contact=<?php echo $contact_id; ?>">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>     
                            </td>
                        </tr>
                        <?php } ?>
                          
                      </tr>

                        </tbody>
                    </table>                        
                    
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
                  Inbox table
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
                                <th>Delete</th>

 
                            </tr>
                        </thead>

                        <tbody>
                     
                        <?php 
                            $i=0;
                            $get_fcontact = "select * from footer_contact";
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
                            <td>  
                                <a href="index.php?delete_fcontact=<?php echo $fcontact_id; ?>">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>     
                            </td>
                        </tr>
                        <?php } ?>
                          
                      </tr>

                        </tbody>
                    </table>                        
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php }?>