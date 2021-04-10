<?php 
        require_once('../backend assets/connection.php');
        //only for static values 
        $client_name="Zaneta Bhagwagar";
        $client_profile="/images/t3.jpg";
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
        .nav-link span, 
        .nav-link .fas{color:#F2D3CF;}
    </style>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    


   
</head>

                
<body id="page-top" class="" style="background-color:#0C3A2D">
    
    <!-- Page Wrapper -->
    <div id="wrapper" >

    <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion " style="background-color:#31120D" id="accordionSidebar">
            <!-- B46617 -->
            <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center " href="../index.php">
                    <div class="">
                        <img src="\images\logo.png" width=45rem height=25rem>
                    </div>
                    <div class="sidebar-brand-text mx-3" style="color:white">Sanctum</div>
                </a>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider my-0"> -->

            <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="client_index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider">            
            <!-- Nav Item - result -->
                <li class="nav-item">
                    <a class="nav-link " href="client_tournament.php" >
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Tournaments</span>
                    </a>
                </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          
        </ul>
    <!-- End of Sidebar -->
        <!-- 0deg, #ff0043 0%, #000000 100% -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:#FBE9DB ">
            <!-- rgb(255, 0, 85); -->
            <!-- Main Content -->
            <div id="content">

            <!-- Topbar -->
                <nav class="navbar navbar-expand topbar static-top shadow" style="background-color:#DB8A80">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars" style="color:#F2D3CF"></i>
                    </button>

                <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow" >
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-caret-down " style="color:#611F19;"></i>&emsp;
                                    <span class="mr-2 d-none d-lg-inline " style="color:#611F19;"><?php echo $client_name?></span>
                                    <img class="img-profile rounded-circle"
                                        src=<?php echo $client_profile; ?>>
                                </a>
                                <!-- background-color:#B36618 -->
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
                                    <!-- <a class="dropdown-item" href="admin_profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-black"></i>
                                        Profile
                                    </a> -->
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                    </ul>
                <!-- topbar navbar -->
            <!-- topbar -->
                </nav>
                
                <!-- other part of body like dashboard with php -->