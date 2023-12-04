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
                        <i class="fa fa-dashboard"></i> Dashboard / Insert Product
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                             Insert Product 
                        </h3>
                    </div> 

                    
                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                            <label class="col-md-3 control-label"> Product Icon </label> 
                                <div class="col-md-6">
                                    <input name="icon" type="file" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Product Name </label> 
                                <div class="col-md-6">
                                    <input name="product_name" type="text" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Product Image </label> 
                                <div class="col-md-6">
                                    <input name="product_img" type="file" class="form-control" required>
                                </div>
                            </div>
                        

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Product Description </label> 
                                <div class="col-md-6">
                                    <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
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
    
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];

    $icon = $_FILES['icon']['name'];
    $temp_name = $_FILES['icon']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$icon");
    
    $product_img = $_FILES['product_img']['name'];
    $temp_name = $_FILES['product_img']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$product_img");
    $insert_product = "insert into product (product_name,product_img,product_desc,icon) values ('$product_name','$product_img','$product_desc','$icon')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
        
    }
}


} ?>