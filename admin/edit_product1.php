<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_product1'])){
        
            $edit_id = $_GET['edit_product1'];
            $get_product = "select * from product1 where product1_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_product);
            $row_edit = mysqli_fetch_array($run_edit);
            $product1_name= $row_edit['product1_name'];
            $product1_img= $row_edit['product1_img'];
            $product1_desc= $row_edit['product1_desc'];
        }

    ?>

       
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Update Product
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                             Update Product 
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Icon </label> 
                                <div class="col-md-6">
                                    <input name="icon1" type="file" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Product Name </label> 
                                <div class="col-md-6">
                                    <input name="product1_name" type="text" class="form-control" value="<?php echo $product1_name; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Product Image </label> 
                                <div class="col-md-6">
                                    <input name="product1_img" type="file" value="<?php echo $product1_img ?>" class="form-control"> <br />

                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Product Description </label> 
                                <div class="col-md-6">
                                    <textarea name="product1_desc" cols="19" rows="6" class="form-control" >
                                    <?php echo $product1_desc; ?>
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
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
    
    $product1_name = $_POST['product1_name'];
    $product1_desc = $_POST['product1_desc'];

    $icon1 = $_FILES['icon1']['name'];
    $temp_name = $_FILES['icon1']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$icon1");
    
    $product1_img = $_FILES['product1_img']['name'];
    $temp_name = $_FILES['product1_img']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$product1_img");

    $update_product = "update product1 set product1_name='$product1_name',product1_img='$product1_img',product1_desc='$product1_desc',icon1='$icon1' where product1_id='$edit_id'";
    
    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){
        
        echo "<script>alert('Product updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
        
    }
}


} ?>