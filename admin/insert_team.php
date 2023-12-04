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
                        <i class="fa fa-dashboard"></i> Dashboard / Insert Management Team
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Management Team Table
                        </h3>
                    </div> 

                    
                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                            <label class="col-md-3 control-label"> Member Name </label> 
                                <div class="col-md-6">
                                    <input name="mgmt_name" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label"> Member Designation </label> 
                                <div class="col-md-6">
                                    <input name="mgmt_designation" type="text" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Member Image </label> 
                                <div class="col-md-6">
                                    <input name="mgmt_image" type="file" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="submit" value="Insert Team Member" type="submit" class="btn btn-primary form-control">
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
    
    $mgmt_name = $_POST['mgmt_name'];
    $mgmt_designation = $_POST['mgmt_designation'];

    $mgmt_image = $_FILES['mgmt_image']['name'];
    $temp_name = $_FILES['mgmt_image']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$mgmt_image");
    
    $insert_mgmt = "insert into mgmt_team (mgmt_name,mgmt_designation,mgmt_image) values ('$mgmt_name','$mgmt_designation','$mgmt_image')";
    
    $run_mgmt = mysqli_query($con,$insert_mgmt);
    
    if($run_mgmt){
        
        echo "<script>alert('Management Team inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_team','_self')</script>";
        
    }
}


} ?>