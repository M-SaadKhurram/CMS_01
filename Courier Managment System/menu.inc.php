<?php 
  require('connection.inc.php'); 
  require('functions.inc.php');
  if ($_SESSION['ADMIN_LOGIN'] == 'yes' && isset($_SESSION['ADMIN_USERNAME'])) {
  } else {
    header('location:login.php');
  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Panel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Admin Dashboard
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin Dashboard</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                <div>
                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">0</span>
                        </a><!-- End Notification Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                                No Notifications
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul><!-- End Notification Dropdown Items -->
                </div>
                </li><!-- End Notification Nav -->
                <div>

                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text"></i>
                            <span class="badge bg-success badge-number">0</span>
                        </a><!-- End Messages Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                            <li class="dropdown-header">
                                You have No Messages
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                        </ul>
                        <!-- End Messages Dropdown Items -->

                    </li>
                    <!-- End Messages Nav -->
                </div>
                <div>
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            <span
                                class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Admin</h6>
                                <span>Web Designer</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Need Help?</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->


        </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="admin_dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Settings</li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="role_master.php">
          <i class="bi bi-person"></i>
          <span>Roles</span>
        </a>
      </li><!-- End Role Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="new_agent.php">
          <i class="bi bi-person"></i>
          <span>Creat New Agent</span>
        </a>
      </li><!-- End Role Page Nav -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="user_list.php">
          <i class="bi bi-person"></i>
          <span>View All User</span>
        </a>
      </li><!-- End Role Page Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="city_master.php">
          <i class="bi bi-person"></i>
          <span>Cities</span>
        </a>
      </li><!-- End City Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="courier_master.php">
          <i class="bi bi-person"></i>
          <span>Courier Companies</span>
        </a>
      </li><!-- End Courier Companies Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="center_master.php">
          <i class="bi bi-person"></i>
          <span>Retail Center</span>
        </a>
      </li><!-- End Retail Center Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin.new_courier.php">
          <i class="bi bi-box-seam-fill"></i>
          <span>New Courier</span>
        </a>
      </li>
      <!-- new Courier -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin.courier_details.php">
          <i class="bi bi-box-seam-fill"></i>
          
          <span>View All Courier Details</span>
        </a>
      </li>
      <!-- View all courier details -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="make_bill.php">
          <i class="bi bi-chat-left-fill"></i>
          <span>Creat Bill</span>
        </a>
      </li>
      <!-- update Bill -->
      <li class="nav-item">
      <li class="nav-item">
        <a class="nav-link collapsed" href="bill.php">
          <i class="bi bi-chat-left-fill"></i>
          <span> Bills</span>
        </a>
      </li>
      <!-- update Bill -->
            <!-- Tracking -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="update_tracking.php">
          <i class="bi bi-truck"></i>
          <span>Update Tracking</span>
        </a>
      </li>
      <!-- Tracking -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="tracking.php">
          <i class="bi bi-truck"></i>
          <span>Tracking</span>
        </a>
      </li><!-- Tracking -->
     


      <li class="nav-item">
        <a class="nav-link collapsed" href="contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-out-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

     

    </ul>

  </aside><!-- End Sidebar-->
