<?php 

    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        if(isset($_GET['edit_job'])){
        
            $edit_id = $_GET['edit_job'];
            $get_job = "select * from career where job_id='$edit_id'";
            $run_edit = mysqli_query($con,$get_job);
            $row_edit = mysqli_fetch_array($run_edit);
            $position= $row_edit['position'];
            $opening= $row_edit['opening'];

            $time= $row_edit['time'];
            $category= $row_edit['category'];
            $salary= $row_edit['salary'];
            $deadline= $row_edit['deadline'];
            $responsible= $row_edit['responsible'];
            $qualification= $row_edit['qualification'];
        }

    ?>

<div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / Edit Job
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Edit Job 
                        </h3>
                    </div> 

                    <div class="panel-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Job Position </label> 
                                <div class="col-md-6">
                                    <input name="position" type="text" class="form-control" required value="<?php echo $position; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Opening </label> 
                                <div class="col-md-6">
                                    <input name="opening" type="text" class="form-control" required value="<?php echo $opening; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Time </label> 
                                <div class="col-md-6">
                                    <select name="time" class="form-control">
                                        <?php 
                                        if($time=="Full Time")
                                        {
                                        ?>
                                        <option value="Full Time">Full Time</option> 
                                        <option value='Part Time'> Part Time </option>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <option value="Part Time">Part Time</option> 
                                        <option value='Full Time'> Full Time </option>
                                        <?php
                                        }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Type </label> 
                                <div class="col-md-6">
                                    <select name="category" class="form-control">
                                        <?php 
                                        if($category=="Job")
                                        {
                                        ?>
                                        <option value="Job">Job</option> 
                                        <option value='Internship'> Internship </option>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            
                                        <option value='Internship'> Internship </option>
                                        <option value="Job">Job</option> 
                                        <?php
                                        }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Salary </label> 
                                <div class="col-md-6">
                                    <input name="salary" type="text" class="form-control" required value="<?php echo $salary; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Deadline </label> 
                                <div class="col-md-6">
                                    <input type="date" name="deadline" class="form-control" required value="<?php echo $deadline; ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Responsibilites </label> 
                                <div class="col-md-6">
                                    <textarea name="responsible" cols="19" rows="4" class="form-control">
                                    <?php echo $responsible; ?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Qualifications </label> 
                                <div class="col-md-6">
                                    <textarea name="qualification" cols="19" rows="3" class="form-control">
                                    <?php echo $qualification; ?>
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label> 
                                <div class="col-md-6">
                                    <input name="update" value="Update Job" type="submit" class="btn btn-primary form-control">
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
    
    $position = $_POST['position'];
    $opening = $_POST['opening'];

    $time = $_POST['time'];
    $category = $_POST['category'];

    $salary = $_POST['salary'];
    $deadline = $_POST['deadline'];
    $responsible = $_POST['responsible'];
    $qualification = $_POST['qualification'];

    $update_job = "update career set position='$position',time='$time',salary='$salary',deadline='$deadline',responsible='$responsible',qualification='$qualification',category='$category',opening='$opening'  where job_id='$edit_id'";
    
    $run_job = mysqli_query($con,$update_job);
    
    if($run_job){
        
        echo "<script>alert('Job updated sucessfully')</script>";
        echo "<script>window.open('index.php?view_job','_self')</script>";
        
    }
}


} ?>