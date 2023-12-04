<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_team'])){
        
            $edit_id = $_GET['edit_team'];
            $get_team = "select * from mgmt_team where mgmt_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_team);
            $row_edit = mysqli_fetch_array($run_edit);
            $mgmt_name = $row_edit['mgmt_name'];
            $mgmt_designation = $row_edit['mgmt_designation'];
            $mgmt_image = $row_edit['mgmt_image'];

            
        }
    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Update Team member
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Update Team member
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Member Name </label> 
                                <div class="col-md-6">
                                    <input name="mgmt_name" type="text" class="form-control" required value="<?php echo $mgmt_name; ?>">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Member Designation </label> 
                                <div class="col-md-6">
                                    <input type="text" name="mgmt_designation" class="form-control" required value="<?php echo $mgmt_designation; ?>">
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
                                    <input name="update" value="Update Management Team" type="submit" class="btn btn-primary form-control">
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
    
    $mgmt_name = $_POST['mgmt_name'];
    $mgmt_designation = $_POST['mgmt_designation'];

    $mgmt_image = $_FILES['mgmt_image']['name'];
    $temp_name = $_FILES['mgmt_image']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$mgmt_image");

    $update_mgmt = "update mgmt_team set mgmt_name='$mgmt_name',mgmt_designation='$mgmt_designation', mgmt_image='$mgmt_image' where mgmt_id='$edit_id'";
    
    $run_mgmt = mysqli_query($con,$update_mgmt);
    
    if($run_mgmt){
        
        echo "<script>alert('Management team updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_team','_self')</script>";
        
    }
}


} ?>