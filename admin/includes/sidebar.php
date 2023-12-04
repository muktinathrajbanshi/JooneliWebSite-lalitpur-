

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
        
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name  ?> <b class="caret"></b>
            </a>
            
            <ul class="dropdown-menu">
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard" class="active">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard   
                </a>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#blog">
                    Blog
                    <i class="fa fa-fw fa-caret-down"></i>    
                </a>
                
                <ul id="blog" class="collapse ">
                    <li>
                        <a href="index.php?insert_blog"> Insert blog</a>
                    </li>
                    <li>
                        <a href="index.php?view_blog"> View blog</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#bod">
                    Board Of Directors
                    <i class="fa fa-fw fa-caret-down"></i>  
                </a>
                
                <ul id="bod" class="collapse ">
                    <li>
                        <a href="index.php?insert_bod"> Insert BOD </a>
                    </li>
                    <li>
                        <a href="index.php?view_bod"> View BOD </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#career">
                    Career
                    <i class="fa fa-fw fa-caret-down"></i>  
                </a>
                
                <ul id="career" class="collapse ">
                    <li>
                        <a href="index.php?insert_job"> Insert Job </a>
                    </li>
                    <li>
                        <a href="index.php?view_job"> View Job </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#client">
                    Clients
                    <i class="fa fa-fw fa-caret-down"></i>  
                </a>
                
                <ul id="client" class="collapse ">
                    <li>
                        <a href="index.php?insert_client"> Insert client </a>
                    </li>
                    <li>
                        <a href="index.php?view_client"> View client </a>
                    </li>
                </ul>
            </li>



            <li>
                <a href="#" data-toggle="collapse" data-target="#team">
                    Management Team
                    <i class="fa fa-fw fa-caret-down"></i>  
                </a>
                
                <ul id="team" class="collapse">
                    <li>
                        <a href="index.php?insert_team"> Insert team </a>
                    </li>
                    <li>
                        <a href="index.php?view_team"> View team </a>
                    </li>
                </ul>
            </li>


            
            <li>
                <a href="#" data-toggle="collapse" data-target="#client_say">
                    Testimony
                    <i class="fa fa-fw fa-caret-down"></i>    
                </a>
                
                <ul id="client_say" class="collapse ">
                    <li>
                        <a href="index.php?insert_clientsay"> Insert testimony</a>
                    </li>
                    <li>
                        <a href="index.php?view_clientsay"> View testimony</a>
                    </li>
                </ul>
            </li>           

            <li>
                <a href="index.php?view_about">
                     View about/ video/ image table 
                </a>
            </li>

            <li>
                <a href="index.php?view_info" >
                     View contact information  
                </a>
            </li>

            <li>
                <a href="index.php?view_demo" >
                     View demo request table 
                </a>
            </li>
            
            <li>
                <a href="index.php?view_contact" >
                     View inbox table 
                </a>
            </li>

            <li>
                <a href="index.php?view_product"> View products </a>
            </li>

            <li>
                <a href="index.php?view_trial" >
                     View trial request table 
                </a>
            </li>

            <li>
                <a href="index.php?view_htrial" >
                     View trial section table 
                </a>
            </li>

                      
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li>   
        </ul>
    </div>
</nav>


