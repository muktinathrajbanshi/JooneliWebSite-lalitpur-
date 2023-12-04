
<?php 

    include("includes/db.php");
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";

        $get_product = "select * from product";
        $run_product = mysqli_query($con,$get_product); 
        
    }else{
        ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Product table
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
                  Product table
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                <thead>
                            <tr>
                                <th>S.N</th>
                               
                                <th> Product name </th>
                                <th> Product icon </th>
                                <th> Product image </th>
                                <th> Product description </th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                        <?php 
                            $i=0;
                            $get_product = "select * from product, product1";
                            $run_product = mysqli_query($con,$get_product);

                            $row_product=mysqli_fetch_array($run_product);
                                $product_id = $row_product['product_id'];
                                $icon = $row_product['icon'];

                                $product_name = $row_product['product_name'];
                                $product_img = $row_product['product_img'];
                                $product_desc = $row_product['product_desc'];

                                $product1_id = $row_product['product1_id'];
                                $icon1 = $row_product['icon1'];

                                $product1_name = $row_product['product1_name'];
                                $product1_img = $row_product['product1_img'];
                                $product1_desc = $row_product['product1_desc'];
                                $i++;
                        ?>
                    
                     
                      <tr>
                          <td> <?php echo $i; ?> </td>
                          <td> <?php echo $product_name; ?> </td>
                          <td> <img src="admin_images/<?php echo $icon; ?>" width="80" height="60"></td>
                          <td> <img src="admin_images/<?php echo $product_img; ?>" width="100" height="80"></td>
                          <td> <?php echo $product_desc; ?> </td> 
                        <td width="80px">         
                            <a href="index.php?edit_product=<?php echo $product_id; ?>">
                             <i class="fa fa-pencil"></i> Edit
                            </a> 
                        </td>
                        <td width="80px"> 
                            <a href="index.php?delete_product=<?php echo $product_id; ?>">
                                <i class="fa fa-trash-o "></i> Delete
                            </a> 
                        </td>
                      </tr>
                      <tr>
                          <td> <?php echo 2; ?> </td>
                          <td> <?php echo $product1_name; ?> </td>
                          <td> <img src="admin_images/<?php echo $icon1; ?>" width="80" height="60"></td>
                          <td> <img src="admin_images/<?php echo $product1_img; ?>" width="100" height="80"></td>
                          <td> <?php echo $product1_desc; ?> </td> 
                        <td width="80px">         
                            <a href="index.php?edit_product1=<?php echo $product1_id; ?>">
                             <i class="fa fa-pencil"></i> Edit
                            </a> 
                        </td>
                        <td width="80px"> 
                            <a href="index.php?delete_product1=<?php echo $product1_id; ?>">
                                <i class="fa fa-trash-o "></i> Delete
                            </a> 
                        </td>
                      </tr>
                      
                        </tbody>
                    </table>                        
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php }?>