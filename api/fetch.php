
<?php 
include("../admin/includes/db.php");

    //background video
     if(isset($_GET['bvideo'])){
     
      global $con;
      $sql="select * from filee";
      $result = mysqli_query($con,$sql) or die('err');
      $output=[];

        while($row=mysqli_fetch_array($result)){
          $output[]=$row;
      }
    echo json_encode($output);
    }


    // home product
    if(isset($_GET['pron'])){
        global $con;
        $sql="select * from product";
        $result = mysqli_query($con,$sql) or die('err');
        $output=[];
  
          while($row=mysqli_fetch_array($result)){
            $output[]=$row;
        }
      echo json_encode($output);
       
      }

      if(isset($_GET['proc'])){
        global $con;
        $sql="select * from product1";
        $result = mysqli_query($con,$sql) or die('err');
        $output=[];
  
          while($row=mysqli_fetch_array($result)){
            $output[]=$row;
        }
      echo json_encode($output);
       
      }

      
      
  

    //home trial/demo
    if(isset($_GET['tdemo'])){
        
        global $con;
        $sql="select * from home_trial";
        $result = mysqli_query($con,$sql) or die('err');
        $output=[];

        while($row=mysqli_fetch_array($result)){
            $output[]=$row;
        }
    echo json_encode($output);
    }

    //home clients
    if(isset($_GET['clien'])){
        
        global $con;
        $sql="select * from client order by 1 LIMIT 0,6";
        $result = mysqli_query($con,$sql) or die('err');
        $output=[];

        while($row=mysqli_fetch_array($result)){
            $output[]=$row;
        }
    echo json_encode($output);
    }


    // home testimonial
    if(isset($_GET['testi'])){
        global $con;
        $sql="select * from clientsay";
        $result = mysqli_query($con,$sql) or die('error');
        $output=[];
  
          while($row=mysqli_fetch_array($result)){
            $output[]=$row;
        }
      echo json_encode($output);
       
      }

    
      



//about
    if(isset($_GET['abbout'])){
        global $con;
        $sql="select * from about";
        $result = mysqli_query($con,$sql);
        $output=[];
      
        while($row=mysqli_fetch_array($result)){
           $output[]=$row;
       }
        echo json_encode($output);
  }


//background image
if(isset($_GET['bgim'])){
    global $con;
    $sql="select * from bgimg";
    $result = mysqli_query($con,$sql);
    $output=[];
  
    while($row=mysqli_fetch_array($result)){
       $output[]=$row;
   }
    echo json_encode($output);
}

//portfolio
if(isset($_GET['portfo'])){
    global $con;
    $sql="select * from portfolio";
    $result = mysqli_query($con,$sql);
    $output=[];
  
    while($row=mysqli_fetch_array($result)){
       $output[]=$row;
   }
    echo json_encode($output);
}


// clients
if(isset($_GET['allclien'])){
        
    global $con;
    $sql="select * from client";
    $result = mysqli_query($con,$sql) or die('err');
    $output=[];

    while($row=mysqli_fetch_array($result)){
        $output[]=$row;
    }
echo json_encode($output);
}


// career
if(isset($_GET['care'])){
        
    global $con;
    $sql="select * from career where category='Job'";
    $result = mysqli_query($con,$sql) or die('err');
    $output=[];

    while($row=mysqli_fetch_array($result)){
        $output[]=$row;
    }
echo json_encode($output);
}

if(isset($_GET['caree'])){
        
    global $con;
    $sql="select * from career where category='Internship'";
    $result = mysqli_query($con,$sql) or die('err');
    $output=[];

    while($row=mysqli_fetch_array($result)){
        $output[]=$row;
    }
echo json_encode($output);
}

//Career detail
if(isset($_GET['j_id']) ){ 
        
    $job_id = $_GET['j_id'];
   $sql="select * from career where job_id='$job_id'";
   $result = mysqli_query($con,$sql);
   $output=[];

   while($row=mysqli_fetch_array($result)){
       $output[]=$row;
   }
   echo json_encode($output);
}


//contact
if(isset($_GET['conn'])){
        
    global $con;
    $sql="select * from contact_info";
    $result = mysqli_query($con,$sql) or die('err');
    $output=[];

    while($row=mysqli_fetch_array($result)){
        $output[]=$row;
    }
echo json_encode($output);
}

//BOD
if(isset($_GET['bodd'])){
    global $con;
    $sql="select * from bod";
    $result = mysqli_query($con,$sql) or die('err');
    $output=[];
    
    while($row=mysqli_fetch_array($result)){
        $output[]=$row;
    }
    echo json_encode($output);  
 
}

// Management Team
if(isset($_GET['teamm'])){
    global $con;
    $sql="select * from mgmt_team";
    $result = mysqli_query($con,$sql) or die('err');
    $output=[];
    
    while($row=mysqli_fetch_array($result)){
        $output[]=$row;
    }
    echo json_encode($output); 
}


// Blog
if(isset($_GET['blogp'])){
    global $con;
    $sql="select * from blog order by 1 DESC";
    $result = mysqli_query($con,$sql) or die('err');
    $output=[];
    
    while($row=mysqli_fetch_array($result)){
        $output[]=$row;
    }
    echo json_encode($output); 

}

//Blog description
if(isset($_GET['id']) ){ 
        
    $blog_id = $_GET['id'];
   $sql="select * from blog where blog_id='$blog_id'";
   $result = mysqli_query($con,$sql);
   $output=[];

   while($row=mysqli_fetch_array($result)){
       $output[]=$row;
   }
   echo json_encode($output);
}

?>


