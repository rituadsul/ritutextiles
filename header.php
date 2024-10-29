<?php
ob_start();
date_default_timezone_set('Asia/Calcutta');
require('function.php');
$db= new DB();
session_start();
if($_SESSION['user_id']=='1'){
$roName="Admin";
}else{
$ro_id=$_SESSION['ro_id'];
$roName=$db->getRoName($db, $db->con,$ro_id);
}
$enter_date="";

if(isset($_SESSION['user']))
{
$user_role_id=$_SESSION['user_role'];
$ro_id=$_SESSION['ro_id'];
$user_id=$_SESSION['user_id'];
$department_id=$_SESSION['department_id'];

$month=$_SESSION['month'];
$year=$_SESSION['year'];
}
else
{
header("location:login.php");
}

if(isset($_SESSION['enter_date'])){
$enter_date=$_SESSION['enter_date'];
}

//echo "findd".$enter_date;


?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8" />
<title>LABMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
<meta name="author" content="Zoyothemes"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/logo.png">

<!-- App css -->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

<!-- Icons -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<!-- body start -->
<body data-menu-color="light" data-sidebar="default">

<!-- Begin page -->
<div id="app-layout">


<!-- Topbar Start -->
<div class="topbar-custom">
<div class="container-xxl">
<div class="d-flex justify-content-between">
<ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
<li>
<button class="button-toggle-menu nav-link ps-0">
<i data-feather="menu" class="noti-icon"></i>
</button>
</li>

</ul>

<ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

<li class="d-none d-sm-flex">
<button type="button" class="btn nav-link" data-toggle="fullscreen">
<i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
</button>
</li>



<li class="dropdown notification-list topbar-dropdown">
<a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
<!-- <img src="assets/images/users/user-11.jpg" alt="user-image" class="rounded-circle"> -->
<span class="pro-user-name ms-1">
<i data-feather="users" class="noti-icon"></i>
</span>
</a>
<div class="dropdown-menu dropdown-menu-end profile-dropdown ">
<!-- item-->
<div class="dropdown-header noti-title">
	 <?php if($_SESSION['user_id']!='1'){ ?>
<h6 class="text-overflow m-0">Welcome, <?php echo $roName; ?>!</h6>
<?php }else { ?>
<h6 class="text-overflow m-0">Welcome, <?php echo $roName; ?>!</h6>
<?php } ?>
</div>


<div class="dropdown-divider"></div>

<!-- item-->
<a class='dropdown-item notify-item' href='logout.php'>
<i class="mdi mdi-location-exit fs-16 align-middle"></i>
<span>Logout</span>
</a>

</div>
</li>

</ul>
</div>

</div>

</div>
<!-- end Topbar -->

<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
<div class="h-100" data-simplebar>

<!--- Sidemenu -->
<div id="sidebar-menu">

<div class="logo-box">

<a class='logo logo-dark' href='index.php'>

<span class="logo-lg">
<img src="assets/images/logo.png" alt="" height="34">
<span style="font-size:18px">&nbsp; Welcome, <?=$roName?></span>
</span>
</a>
</div>

<ul id="side-menu">

<li class="menu-title">Menu</li>

<li>
<a href="index.php">
<i data-feather="home"></i>
<span> Dashboard </span>
</a>
</li>
  <?php if($_SESSION['user_id']!="1") {?>

<li>
<a class='tp-link' href='sample_transaction.php'>
<i data-feather="calendar"></i>
<span> Add Data </span>
</a>
</li>

<?php } ?>

<?php if($_SESSION['user_id']=="1") {?>

<li class="menu-title">Users</li>
<li>
<a class='tp-link' href='user.php'>
<i data-feather="users"></i>
<span> Users </span>
</a>
</li>

<?php } ?>


<li class="menu-title">Reports</li>
<li>
<a href="#sidebarAuth" data-bs-toggle="collapse">
<i data-feather="file-text"></i>
<span> Report </span>
<span class="menu-arrow"></span>
</a>
<div class="collapse" id="sidebarAuth">
<ul class="nav-second-level">
<?php if($_SESSION['user_id']!="1") {?>
<li>
<a class='tp-link' href='ro_report.php'>Edit Report</a>
</li>
<?php } ?>
<li>
<a class='tp-link' href='ro_report_view.php'>View Report</a>
</li>
</ul>
</div>
</li>




</ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
</div>
<!-- Left Sidebar End -->
