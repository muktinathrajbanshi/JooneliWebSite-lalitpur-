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
                        <i class="fa fa-dashboard"></i> Dashboard / Insert Board of Director
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                             Insert Board of Director
                        </h3>
                    </div> 

                    
                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                            <label class="col-md-3 control-label"> BOD Name </label> 
                                <div class="col-md-6">
                                    <input name="bod_name" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label"> BOD Designation </label> 
                                <div class="col-md-6">
                                    <input name="bod_designation" type="text" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> BOD Image </label> 
                                <div class="col-md-6">
                                    <input name="bod_img" type="file" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="submit" value="Insert BOD" type="submit" class="btn btn-primary form-control">
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
    
    $bod_name = $_POST['bod_name'];
    $bod_designation = $_POST['bod_designation'];

    $bod_img = $_FILES['bod_img']['name'];
    $temp_name = $_FILES['bod_img']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$bod_img");
    
    $insert_bod = "insert into bod (bod_name,bod_img,bod_designation) values ('$bod_name','$bod_img','$bod_designation')";
    
    $run_bod = mysqli_query($con,$insert_bod);
    
    if($run_bod){
        
        echo "<script>alert('Board of Director inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_bod','_self')</script>";
        
    }
}


} ?>