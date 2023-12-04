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
                        <i class="fa fa-dashboard"></i> Dashboard / Insert Blog
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                             Insert Blog 
                        </h3>
                    </div> 

                    
                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Blog Title </label> 
                                <div class="col-md-6">
                                    <input name="blog_title" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Blog Description </label> 
                                <div class="col-md-6">
                                    <textarea name="blog_desc" cols="20" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Blog Image </label> 
                                <div class="col-md-6">
                                    <input name="blog_img" type="file" class="form-control" required>
                                </div>
                            </div>
                        

                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="submit" value="Insert Blog" type="submit" class="btn btn-primary form-control">
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
    
    $blog_title = $_POST['blog_title'];
    $blog_desc = $_POST['blog_desc'];

    $blog_img = $_FILES['blog_img']['name'];
    $temp_name = $_FILES['blog_img']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$blog_img");
    
    $insert_blog = "insert into blog (blog_title,blog_desc,blog_img) values ('$blog_title','$blog_desc','$blog_img')";
    
    $run_blog = mysqli_query($con,$insert_blog);
    
    if($run_blog){
        
        echo "<script>alert('Blog inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_blog','_self')</script>";
        
    }
}


} ?>