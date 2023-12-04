<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_htrial'])){
        
            $edit_id = $_GET['edit_htrial'];
            $get_trial = "select * from home_trial where htrial_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_trial);
            $row_edit = mysqli_fetch_array($run_edit);
            $htrial_img = $row_edit['htrial_img'];
            $htrial_desc = $row_edit['htrial_desc'];
        }

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Update Trial
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Update Trial 
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Trial Image </label> 
                                <div class="col-md-6">
                                    <input name="htrial_img" type="file" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Trial Description </label> 
                                <div class="col-md-6">
                                    <textarea name="htrial_desc" cols="19" rows="4" class="form-control">
                                        <?php echo $htrial_desc; ?>
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="update" value="Update Trial" type="submit" class="btn btn-primary form-control">
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

    $htrial_desc = $_POST['htrial_desc'];
    $htrial_img = $_FILES['htrial_img']['name'];
    $temp_name = $_FILES['htrial_img']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$htrial_img");

     $update_trial = "update home_trial set htrial_desc='$htrial_desc', htrial_img='$htrial_img' where htrial_id='$edit_id'";
    
     $run_trial = mysqli_query($con,$update_trial);
    
     if($run_trial){
        
         echo "<script>alert('Updated sucessfully')</script>";
         echo "<script>window.open('index.php?view_htrial','_self')</script>";
        
     }
}


} ?>