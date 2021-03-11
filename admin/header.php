<?php
	$dbhost ="localhost";
	$dbusername="root";	
	$dbpassword="";
	$dbname="sanctum_db";
	

	$conn=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname) or die(" CONNECTION FAILED! ");	
?>	
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Sanctum - <?php echo $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        body{
            -ms-overflow-style:none;
            scrollbar-width:none;
        }
        body::-webkit-scrollbar{display:none;}
    </style>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
    $admin_name="Zaneta Z. Bhagwagar";
    $admin_profile="img/undraw_profile.svg";
?>

                
<body id="page-top" class="text-white" style="background-color:black">
    
    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion " style="background:linear-gradient(0deg, rgba(176,2,48,0.25) 0%, rgba(0,0,0,1) 100%);" id="accordionSidebar">

            <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Sanctum</div>
                </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">Client</div> -->

            <!-- Nav Item - Client Menu -->
                <li class="nav-item">
                    <a class="nav-link " href="admin_clients.php" >
                        <i class="fas fa-fw fa-user"></i>
                        <span>Clients</span>
                    </a>
                    <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="buttons.html">Buttons</a>
                            <a class="collapse-item" href="cards.html">Cards</a>
                        </div>
                    </div> -->
                </li>

            <!-- Nav Item - trans details -->
                <li class="nav-item">
                    <a class="nav-link " href="admin_trans_details.php">
                        <i class="fas fa-fw fa-credit-card"></i>
                        <span>Transaction Details</span>
                    </a>
                    <!-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="utilities-color.html">Colors</a>
                            <a class="collapse-item" href="utilities-border.html">Borders</a>
                            <a class="collapse-item" href="utilities-animation.html">Animations</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a>
                        </div>
                    </div> -->
                </li>

            <!-- Nav Item - newsletter -->
                
                    <!-- <li class="nav-item">
                <a class="nav-link " href="#" >
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Newsletter</span>
                    </a>
                </li> -->

            <!-- Nav Item - Feedback -->
                <li class="nav-item">
                <a class="nav-link " href="admin_feedback.php" >
                        <i class="fas fa-fw fa-paperclip"></i>
                        <span>Feedback</span>
                    </a>
                </li>               
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
                <!-- <div class="sidebar-heading">Tournament</div> -->

            <!-- Nav Item - tournament Menu -->
                <li class="nav-item">
                    <a class="nav-link " href="admin_tournament.php" >
                        <i class="fas fa-fw fa-bolt"></i>
                        <span>Tournaments</span>
                    </a>
                </li>

            <!-- Nav Item - games -->
                <li class="nav-item">
                    <a class="nav-link " href="admin_game.php" >
                        <i class="fas fa-fw fa-gamepad"></i>
                        <span>Games</span>
                    </a>
                </li>

            <!-- Nav Item - scoreboard -->
                <li class="nav-item">
                    <a class="nav-link " href="admin_scoreboard.php" >
                        <i class="fas fa-fw fa-star"></i>
                        <span>Scoreboard</span>
                    </a>
                </li>
            
            <!-- Nav Item - result -->
                <li class="nav-item">
                    <a class="nav-link " href="admin_result.php" >
                        <i class="fas fa-fw fa-list"></i>
                        <span>Result</span>
                    </a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          
        </ul>
        <!-- End of Sidebar -->
        <!-- 0deg, #ff0043 0%, #000000 100% -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:black; ">
        <!-- rgb(255, 0, 85); -->
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color:#41011249;color:white;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-white"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow" >
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-caret-down text-white"></i>&emsp;
                                <span class="mr-2 d-none d-lg-inline small text-white"><?php echo $admin_name?></span>
                                <img class="img-profile rounded-circle"
                                    src=<?php echo $admin_profile ?>>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right background-color:#00000048;animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-black"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <h3 class="m-4 "><?php echo $title?></h3>
                <!-- other part of body like dashboard with php -->

            
            