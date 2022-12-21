<?php 
session_start();
	
$sesmail = $_SESSION['emal'];
$sesfulln = $_SESSION['fulln'];
$sescourse = $_SESSION['course'];

include_once "connection.php";

if (empty($sesmail)){header("Location:logoutapplicant.php");}

date_default_timezone_set('Africa/Lagos');
$dreg= date('M j, Y h:i a', time());

$dkode=rand(10000, 99999);

//$luku = $_GET['id'];

if (isset($_POST['submit'])){
	//mysqli_real_escape_string($con,$_POST["pass1"]);
		$fullnam = mysqli_real_escape_string($conn, $_POST['fullnam']);
		$jamb = mysqli_real_escape_string($conn, $_POST['jamb']);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$addres = mysqli_real_escape_string($conn, $_POST['addres']);
		$sex = mysqli_real_escape_string($conn, $_POST['sex']);
		$stat = mysqli_real_escape_string($conn, $_POST['stat']);
		$lga = mysqli_real_escape_string($conn, $_POST['lga']);
		$subjecty1 = mysqli_real_escape_string($conn, $_POST['subjecty1']);
		$skore1 = mysqli_real_escape_string($conn, $_POST['skore1']);
		$subjecty2 = mysqli_real_escape_string($conn, $_POST['subjecty2']);
		$skore2 = mysqli_real_escape_string($conn, $_POST['skore2']);
		$subjecty3 = mysqli_real_escape_string($conn, $_POST['subjecty3']);
		$skore3 = mysqli_real_escape_string($conn, $_POST['skore3']);
		$subjecty4 = mysqli_real_escape_string($conn, $_POST['subjecty4']);
		$skore4 = mysqli_real_escape_string($conn, $_POST['skore4']);
		$subjecty5 = mysqli_real_escape_string($conn, $_POST['subjecty5']);
		$skore5 = mysqli_real_escape_string($conn, $_POST['skore5']);

if($jamb == "" || $dob== "" ||$addres == ""|| $sex== "" || $stat== ""|| $lga == "" || $subjecty1 == ""|| $skore1== ""||$subjecty2== "" || $skore2== ""||$subjecty3== "" || $skore3== ""||$subjecty4 == "" || $skore4 == "" ||$subjecty5== "" || $skore5== ""){
//echo $jamb, $dob, $addres, $sex, $stat, $lga, $subjecty1, $skore1, $subjecty2, $skore2, $subjecty3, $skore3, $subjecty4, $skore4, $subjecty5, $skore5;

	 $reportalert="<script type ='text/javascript'>
  alert('please do not submit empty form.')
  window.location.href='jambupload.php';
  </script>";

}else if (strlen($jamb)>10){
	 $reportalert = '<script type="text/javascript">
		  alert("Your Jamb Reg no. must not be more than 10 characters");
		  window.location.href="jambupload.php";
		  </script>';

}else if (strlen($skore1)!= 2){
	 
	 $reportalert = '<script type="text/javascript">
		  alert("Your Jamb Reg no. must not be more than 10 characters");
		  window.location.href="jambupload.php";
		  </script>';
} else {   

	  $puty = mysqli_query($conn, "INSERT INTO jamb_records (fullnam, jamb, dob, addres, sex, stat, lga, subjecty1, skore1, subjecty2, skore2, subjecty3, skore3, subjecty4, skore4, subjecty5, skore5) VALUES ('$sesfulln', '$jamb', '$dob', '$addres', '$sex', '$stat', '$lga', '$subjecty1', '$skore1', '$subjecty2', '$skore2', '$subjecty3', '$skore3', '$subjecty4', '$skore4', '$subjecty5', '$skore5')");

	  if (mysqli_query($conn, $puty)) {
		 $reportalert = '<script type="text/javascript">
		  alert("successful and saved");
		  window.location.href="jambupload.php";
		  </script>';
	  }
    }

 }
 


 ?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CRM Admin Panel</title>
		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
		<!-- Start Global Mandatory Style
			=====================================================================-->
		<!-- jquery-ui css -->
		<link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap rtl -->
		<!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
		<!-- Lobipanel css -->
		<link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
		<!-- Pace css -->
		<link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
		<!-- Font Awesome -->
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<!-- Pe-icon -->
		<link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
		<!-- Themify icons -->
		<link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
		<!-- End Global Mandatory Style
			=====================================================================-->
		<!-- Start Theme Layout Style
			=====================================================================-->
		<!-- Theme style -->
		<link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
		<!-- Theme style rtl -->
		<!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
		<!-- End Theme Layout Style
			=====================================================================-->
	</head>
	<body class="hold-transition sidebar-mini">
	<!--preloader-->
		<?php if (!empty($reportalert)){echo $reportalert;} ?>
		<!-- Site wrapper -->
		<div class="wrapper">
			<header class="main-header">
				<a href="index-2.html" class="logo">
					<!-- Logo -->
					<span class="logo-mini">
					<img src="assets/dist/img/mini-logo.png" alt="">
					</span>
					<span class="logo-lg">
					<img src="assets/dist/img/logo.png" alt="">
					</span>
				</a>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<!-- Sidebar toggle button-->
						<span class="sr-only">Toggle navigation</span>
						<span class="pe-7s-angle-left-circle"></span>
					</a>
					<!-- searchbar-->
					<a href="#search"><span class="pe-7s-search"></span></a>
					<div id="search">
						<button type="button" class="close">×</button>
						<form>
							<input type="search" value="" placeholder="Search.." />
							<button type="submit" class="btn btn-add">Search...</button>
						</form>
					</div>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Orders -->
							<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown"> 
								<i class="pe-7s-cart"></i>
								<span class="label label-primary">5</span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<ul class="menu">
											<li >
												<!-- start Orders -->
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/basketball-jersey.png" class="img-thumbnail" alt="User Image">
													</div>
													<h4>polo shirt</h4>
													<p><strong>total item:</strong> 21
													</p>
												</a>
											</li>
											<li>
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/shirt.png" class="img-thumbnail" alt="User Image">
													</div>
													<h4>Kits</h4>
													<p><strong>total item:</strong> 11
													</p>
												</a>
											</li>
											<li>
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/football.png" class="img-thumbnail" alt="User Image">
													</div>
													<h4>Football</h4>
													<p><strong>total item:</strong> 16
													</p>
												</a>
											</li>
											<li class="nav-list">
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/shoe.png" class="img-thumbnail" alt="User Image">
													</div>
													<h4>Sports sheos</h4>
													<p><strong>total item:</strong> 10
													</p>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- Messages -->
							<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="pe-7s-mail"></i>
								<span class="label label-success">4</span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<ul class="menu">
											<li>
												<!-- start message -->
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/avatar.png" class="img-circle" alt="User Image">
													</div>
													<h4>Ronaldo</h4>
													<p>Please oreder 10 pices of kits..</p>
													<span class="badge badge-success badge-massege"><small>15 hours ago</small>
													</span>
												</a>
											</li>
											<li>
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
													</div>
													<h4>Leo messi</h4>
													<p>Please oreder 10 pices of Sheos..</p>
													<span class="badge badge-info badge-massege"><small>6 days ago</small>
													</span>   
												</a>
											</li>
											<li>
												<a href="#" class="border-gray">
													<div class="pull-left" >
														<img src="assets/dist/img/avatar3.png" class="img-circle" alt="User Image">
													</div>
													<h4>Modric</h4>
													<p>Please oreder 6 pices of bats..</p>
													<span class="badge badge-info badge-massege"><small>1 hour ago</small>
													</span>
												</a>
											</li>
											<li>
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/avatar4.png" class="img-circle" alt="User Image">
													</div>
													<h4>Salman</h4>
													<p>Hello i want 4 uefa footballs</p>
													<span class="badge badge-danger badge-massege">
													<small>6 days ago</small>
													</span>  
												</a>
											</li>
											<li>
												<a href="#" class="border-gray">
													<div class="pull-left">
														<img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
													</div>
													<h4>Sergio Ramos</h4>
													<p>Hello i want 9 uefa footballs</p>
													<span class="badge badge-info badge-massege"><small>5 hours ago</small>
													</span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- Notifications -->
							<li class="dropdown notifications-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="pe-7s-bell"></i>
								<span class="label label-warning">7</span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<ul class="menu">
											<li>
												<a href="#" class="border-gray">
												<i class="fa fa-dot-circle-o color-green"></i>Change Your font style</a>
											</li>
											<li><a href="#" class="border-gray">
												<i class="fa fa-dot-circle-o color-red"></i>
												check the system ststus..</a>
											</li>
											<li><a href="#" class="border-gray">
												<i class="fa fa-dot-circle-o color-yellow"></i>
												Add more admin...</a>
											</li>
											<li><a href="#" class="border-gray">
												<i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
											</li>
											<li><a href="#" class="border-gray">
												<i class="fa fa-dot-circle-o color-yellow"></i>
												Add more admin...</a>
											</li>
											<li><a href="#" class="border-gray">
												<i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- Tasks -->
							<li class="dropdown tasks-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="pe-7s-note2"></i>
								<span class="label label-danger">6</span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<ul class="menu">
											<li>
												<!-- Task item -->
												<a href="#" class="border-gray">
													<span class="label label-success pull-right">50%</span>
													<h3><i class="fa fa-check-circle"></i> Theme color should be change</h3>
												</a>
											</li>
											<!-- end task item -->
											<li>
												<!-- Task item -->
												<a href="#" class="border-gray">
													<span class="label label-warning pull-right">90%</span>
													<h3><i class="fa fa-check-circle"></i> Fix Error and bugs</h3>
												</a>
											</li>
											<!-- end task item -->
											<li>
												<!-- Task item -->
												<a href="#" class="border-gray">
													<span class="label label-danger pull-right">80%</span>
													<h3><i class="fa fa-check-circle"></i> Sidebar color change</h3>
												</a>
											</li>
											<!-- end task item -->
											<li>
												<!-- Task item -->
												<a href="#" class="border-gray">
													<span class="label label-info pull-right">30%</span>   
													<h3><i class="fa fa-check-circle"></i> font-family should be change</h3>
												</a>
											</li>
											<li>
												<!-- Task item -->
												<a href="#"  class="border-gray">
													<span class="label label-success pull-right">60%</span>
													<h3><i class="fa fa-check-circle"></i> Fix the database Error</h3>
												</a>
											</li>
											<li>
												<!-- Task item -->
												<a href="#"  class="border-gray">
													<span class="label label-info pull-right">20%</span>
													<h3><i class="fa fa-check-circle"></i> data table data missing</h3>
												</a>
											</li>
											<!-- end task item -->
										</ul>
									</li>
								</ul>
							</li>
							<!-- Help -->
							<li class="dropdown dropdown-help hidden-xs">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="pe-7s-settings"></i></a>
								<ul class="dropdown-menu" >
									<li>
										<a href="profile.html">
										<i class="fa fa-line-chart"></i> Networking</a>
									</li>
									<li><a href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a></li>
									<li><a href="#"><i class="fa fa-bar-chart"></i> Settings</a></li>
									<li><a href="login.html">
										<i class="fa fa-wifi"></i> wifi</a>
									</li>
								</ul>
							</li>
							<!-- user -->
							<li class="dropdown dropdown-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="assets/dist/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>
								<ul class="dropdown-menu" >
									<li>
										<a href="profile.html">
										<i class="fa fa-user"></i> User Profile</a>
									</li>
									<li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li>
									<li><a href="login.html">
										<i class="fa fa-sign-out"></i> Signout</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- =============================================== -->
			<!-- Left side column. contains the sidebar -->
			<?php require_once("sidebar.php") ?>
			<!-- =============================================== -->
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="header-icon">
						<i class="fa fa-users"></i>
					</div>
					<div class="header-title">
						<h1>JAMB UPLOAD</h1>
						<small></small>
					</div>
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<!-- Form controls -->
						<div class="col-sm-12">
							<div class="panel panel-bd lobidrag">
								<div class="panel-heading">
									<div class="btn-group" id="buttonlist"> 
										<a class="btn btn-add " href="clist.html"> 
										<i class=""></i><?php echo $sesfulln; ?>, Jamb Details </a>  
									</div>
								</div>
								<div class="panel-body">
									<form class="col-sm-6" method="POST" action="">
										<div class="form-group">
											<label>Full name</label> 
											<input type="text" class="form-control" placeholder="<?php echo $sesfulln; ?>" name="fullnam">
										</div>
										<div class="form-group"> 
											<label>Jamb Reg No</label> 
											<input type="text" class="form-control" placeholder="Jamb reg no" name="jamb" required>
										</div>
										<div class="form-group">
											<label>Course</label> 
											<input type="text" class="form-control" placeholder="<?php echo $sescourse; ?>" name="course" required>
										</div>
										<div class="form-group">
											<label>Date of Birth</label>
											<input type="date" class="form-control" placeholder="Date of Birth" name="dob" required>
										</div>
										<div class="form-group">
											<label>Address</label>
											<input type="text" class="form-control" placeholder="Enter Address" name="addres" required>
										</div>
										<div class="form-group">
											<label>Sex</label><br>
											<label class="radio-inline"><input name="sex" value="male" checked="checked" type="radio">Male</label> 
											<label class="radio-inline"><input name="sex" value="female" type="radio">Female</label>
										</div>
											<div class="form-group col-sm-6">
												<label>State of Origin</label>
											  <select type="text" name="stat" class="form-control">
												 <option value="select">Click to select</option>
												<?php 
												 $staty = mysqli_query($conn,"SELECT * FROM state");
												  while ($row=mysqli_fetch_assoc($staty)) {
												  $star = $row['states'];
												  $stid = $row['id'];                                  
												 ?> 
									
										<option value="<?php echo $star ;?>" > <?php echo $star ?> </option>
												<?php } ?>
											 </select>
										  </div>
										  <div class="form-group col-sm-6">
											<label>Local Government</label> 
											 <select type="text" name="lga" class="form-control">
												 <option value="select">Click to select</option>
												<?php 
												 $dad = mysqli_query($conn,"SELECT * FROM mytable where localid= $luku");
												  while ($row=mysqli_fetch_assoc($dad)) {
												  $locid = $row['localid'];
												  $locgov = $row['lga'];
												 $lekan = 'jambupload.php?id='.$locid.'&name='.$locgov;

												 ?> 
								<option value="<?php echo $locgov; ?>"><?php echo $locgov; ?></option>
												<?php } ?>
											 </select>
										  </div>
										<br> <br>
										  <div class="form-group">
											<p align="center"><b>JAMB RESULTS</b></p>
										</div>
										 
										  <div class="form-group col-lg-6">
												<label>SUBJECT</label>
												<select type="text" name="subjecty1" class="form-control">
												 <option value="select">Click to select</option>
												<?php 
												 $subjek = mysqli_query($conn,"SELECT * FROM subject");
												  while ($row=mysqli_fetch_assoc($subjek)) {
												  $sub = $row['subjects'];                                  
												 ?> 
												<option value="<?php echo $sub; ?>" ><?php echo $sub ?></option>
												<?php } ?>
											 </select>
											</div> 
										  <div class="form-group col-lg-6">
												<label>SCORE</label>
												<input type="number" value="" id="" class="form-control" name="skore1">                                
										  </div>
										  <div class="form-group col-lg-6">
												<select type="text" name="subjecty2" class="form-control">
												 <option value="select">Click to select</option>
												<?php 
												 $subjek = mysqli_query($conn,"SELECT * FROM subject");
												  while ($row=mysqli_fetch_assoc($subjek)) {
												  $sub = $row['subjects'];                                  
												 ?> 
												<option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
												<?php } ?>
											 </select>
										  </div>
										  <div class="form-group col-lg-6">
												<input type="number" value="" id="" class="form-control" name="skore2">
												
										  </div>
											<div class="form-group col-lg-6">
											  <select type="text" name="subjecty3" class="form-control">
												 <option value="select">Click to select</option>
												<?php 
												 $subjek = mysqli_query($conn,"SELECT * FROM subject");
												  while ($row=mysqli_fetch_assoc($subjek)) {
												  $sub = $row['subjects'];                                  
												 ?> 
												<option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
												<?php } ?>
											 </select>
										  </div>
										  <div class="form-group col-lg-6">
												<input type="number" value="" id="" class="form-control" name="skore3">
												
										  </div>
											<div class="form-group col-lg-6">
												<select type="text" name="subjecty4" class="form-control">
												 <option value="select">Click to select</option>
												<?php 
												 $subjek = mysqli_query($conn,"SELECT * FROM subject");
												  while ($row=mysqli_fetch_assoc($subjek)) {
												  $sub = $row['subjects'];                                  
												 ?> 
												<option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
												<?php } ?>
											 </select>
										  </div>
										  <div class="form-group col-lg-6">
												<input type="number" value="" id="" class="form-control" name="skore4">
										  </div>
											<div class="form-group col-lg-6">
											  <select type="text" name="subjecty5" class="form-control">
												 <option value="select">Click to select</option>
												<?php 
												 $subjek = mysqli_query($conn,"SELECT * FROM subject");
												  while ($row=mysqli_fetch_assoc($subjek)) {
												  $sub = $row['subjects'];                                  
												 ?> 
												<option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
												<?php } ?>
											 </select>
										  </div>
										  <div class="form-group col-lg-6">
												<input type="number" value="" id="" class="form-control" name="skore5">
										  </div>
									  <div>
										<button type="submit" name="submit" class="btn btn-warning">SUBMIT</button>    
										 </div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				<strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
			</footer>
		</div>
		<!-- ./wrapper -->
		<!-- Start Core Plugins
			=====================================================================-->
		<!-- jQuery -->
		<script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
		<!-- jquery-ui --> 
		<script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
		<!-- Bootstrap -->
		<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- lobipanel -->
		<script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
		<!-- Pace js -->
		<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
		<!-- SlimScroll -->
		<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<!-- FastClick -->
		<script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
		<!-- CRMadmin frame -->
		<script src="assets/dist/js/custom.js" type="text/javascript"></script>
		<!-- End Core Plugins
			=====================================================================-->
		<!-- Start Theme label Script
			=====================================================================-->
		<!-- Dashboard js -->
		<script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
		<!-- End Theme label Script
			=====================================================================-->
	</body>

<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
</html>

