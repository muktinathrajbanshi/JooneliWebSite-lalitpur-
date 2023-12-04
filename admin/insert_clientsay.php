<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
    include("includes/db.php");

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Insert Feedback
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Insert Feedback 
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
                                    <input name="clients_name" type="text" class="form-control" required>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Designation </label> 
                                <div class="col-md-6">
                                    <input type="text" name="clients_designation" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Feedback </label> 
                                <div class="col-md-6">
                                    <textarea name="feedback" cols="19" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="submit" value="Insert feedback" type="submit" class="btn btn-primary form-control">
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

if(isset($_POST['submit'])){
    
    $clients_name = $_POST['clients_name'];
    $clients_designation = $_POST['clients_designation'];
    $feedback = $_POST['feedback'];
    

     $clients_photo = $_FILES['clients_photo']['name'];
     $temp_name = $_FILES['clients_photo']['tmp_name'];
     move_uploaded_file($temp_name,"admin_images/$clients_photo");

     $insert_clients = "insert into clientsay (clients_photo,clients_name,clients_designation,feedback) values ('$clients_photo','$clients_name','$clients_designation','$feedback')";
    
     $run_clients = mysqli_query($con,$insert_clients);
    
     if($run_clients){
        
         echo "<script>alert('Clients inserted sucessfully')</script>";
         echo "<script>window.open('index.php?view_clientsay','_self')</script>";
        
     }
}


} ?>