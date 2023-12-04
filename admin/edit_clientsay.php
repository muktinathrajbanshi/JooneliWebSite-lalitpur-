<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_clientsay'])){
        
            $edit_id = $_GET['edit_clientsay'];
            $get_client = "select * from clientsay where clients_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_client);
            $row_edit = mysqli_fetch_array($run_edit);
            $clients_photo = $row_edit['clients_photo'];
            $clients_name = $row_edit['clients_name'];
            $clients_designation = $row_edit['clients_designation'];
            $feedback = $row_edit['feedback'];
        }

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Update Feedback
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Update Feedback 
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Client Photo </label> 
                                <div class="col-md-6">
                                    <input name="clients_photo" type="file" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Client Name </label> 
                                <div class="col-md-6">
                                    <input name="clients_name" type="text" class="form-control" required value="<?php echo $clients_name; ?>">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Designation </label> 
                                <div class="col-md-6">
                                    <input type="text" name="clients_designation" class="form-control" required value="<?php echo $clients_designation; ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Feedback </label> 
                                <div class="col-md-6">
                                    <textarea name="feedback" cols="19" rows="4" class="form-control">
                                        <?php echo $feedback; ?>
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="update" value="Update feedback" type="submit" class="btn btn-primary form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/tinymce/tinymce.min.js"></script>
        <script>
        tinymce.init({
        selector: "textarea",
        plugins: "code",
        toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code image_upload",
        menubar:false,
        statusbar: false,
        content_style: ".mce-content-body {font-size:15px;font-family:Arial,sans-serif;}",
        height: 200,
        setup: function(ed) {
            
            var fileInput = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
            $(ed.getElement()).parent().append(fileInput);
            
            fileInput.on("change",function(){           
                var file = this.files[0];
                var reader = new FileReader();          
                var formData = new FormData();
                var files = file;
                formData.append("file",files);
                formData.append('filetype', 'image');               
                jQuery.ajax({
                    url: "upload.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    async: false,
                    success: function(response){
                        var fileName = response;
                        if(fileName) {
                            ed.insertContent('<img src="upload/'+fileName+'"/>');
                        }
                    }
                });     
                reader.readAsDataURL(file);  
            });     
            
            ed.addButton('image_upload', {
                tooltip: 'Upload Image',
                icon: 'image',
                onclick: function () {
                    fileInput.trigger('click');
                }
                });
            }
        });
        </script>

<?php

if(isset($_POST['update'])){
    
    $clients_name = $_POST['clients_name'];
    $clients_designation = $_POST['clients_designation'];
    $feedback = $_POST['feedback'];

    $clients_photo = $_FILES['clients_photo']['name'];
    $temp_name = $_FILES['clients_photo']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$clients_photo");

    $update_clients = "update clientsay set clients_photo='$clients_photo', clients_name='$clients_name',clients_designation='$clients_designation',feedback='$feedback' where clients_id='$edit_id'";
    
    $run_clients = mysqli_query($con,$update_clients);
    
    if($run_clients){
        
        echo "<script>alert('Clients updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_clientsay','_self')</script>";
        
    }
}


} ?>