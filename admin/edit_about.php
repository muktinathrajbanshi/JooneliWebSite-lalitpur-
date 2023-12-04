
<?php 

    include("includes/db.php");
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_about'])){
        
            $edit_id = $_GET['edit_about'];
            $get_about = "select * from about where about_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_about);
            $row_edit = mysqli_fetch_array($run_edit);
            $about= $row_edit['about'];
        }
        ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / About table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                     About table
                
               </h3>
            </div>
            
            <div class="panel-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> About </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea name="about" cols="19" rows="10" class="form-control">
                              <?php echo $about; ?>
                          </textarea>
                      </div>
                   </div>

                   <div class="form-group">
                       <label class="col-md-3 control-label"></label> 
                       <div class="col-md-6">
                           <input name="update" value="Update About" type="submit" class="btn btn-primary form-control">
                       </div>
                    </div>
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

    $about = $_POST['about'];

    
    $update_about = "update about set about='$about' where about_id='$edit_id'";
    
    $run_about = mysqli_query($con,$update_about);
    
    if($run_about){
        
       echo "<script>alert('Updated Successfully')</script>"; 
       echo "<script>window.open('index.php?view_about','_self')</script>"; 
        
    }
    
}

 }?>