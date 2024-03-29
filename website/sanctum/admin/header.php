﻿<?php

     require_once('../backend assets/connection.php');
    
    session_start();
    if(!isset($_SESSION['admin_name']))
    {
        header('location:../index.php');
    }
    else
    {
        $admin_name=$_SESSION['admin_name'];
        $admin_profile=$_SESSION['admin_profile_photo'];
    }

?>	
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="images/logo3.png">
    <title>Sanctum - <?php echo $title ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">-->
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
        .nav-link .fas{color:#fff}
        
    </style>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

                
<body id="page-top"  style="background-color:#00183d">
    <!-- #0C3A2D -->
    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion " style="background-color:#00183d" id="accordionSidebar">
        <!-- B46617 -->
        <!-- #E48F3A -->
            <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center " href="../index.php">
                    <div class="">
                        <img src="\images\logo.png" width=45rem height=25rem>
                    </div>
                    <div class="sidebar-brand-text mx-3" style="color:white">Sanctum</div>
                </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link " href="index.php">
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
                </li>

            <!-- Nav Item - trans details -->
                <!--<li class="nav-item">
                    <a class="nav-link " href="admin_trans_details.php">
                        <i class="fas fa-fw fa-credit-card"></i>
                        <span>Transaction Details</span>
                    </a>
                </li>-->

            <!-- Nav Item - Feedback -->
                <li class="nav-item">
                <a class="nav-link " href="admin_feedback.php" >
                        <i class="fas fa-fw fa-paperclip"></i>
                        <span>Ideas</span>
                    </a>
                </li>               
            
            <!-- Divider -->
            <hr class="sidebar-divider">

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
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:#e5e5e5; ">
        <!-- rgb(255, 0, 85);#0C3A2D -->
        
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color:none;color:#0f1225;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars" style="#0f1225"></i>
                        <!-- #B36618 -->
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow" >
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-caret-down"style="color:#0f1225;"></i>&emsp;
                                    <span class="mr-2 d-none d-lg-inline small" style="color:#0f1225;font-weight:bold"><?php echo $admin_name?></span>
                                    <img class="img-profile rounded-circle"
                                        src=<?php echo $admin_profile; ?>>
                                </a>
                                <!-- background-color:#B36618 -->
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
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
                <h3 class="m-4 " style="color:#00183D"><?php echo $title?></h3>
                <!-- other part of body like dashboard with php -->

            
            