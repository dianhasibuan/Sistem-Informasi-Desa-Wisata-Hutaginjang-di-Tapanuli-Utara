<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Wisata Alam Huta Ginjang </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!--//end-animate-->
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="banner">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> About Us </h1>
		</div>
	</div>

	<div class="jumbotron">
		<div class="container">
			<p>Project ini dibuat untuk kebutuhan tugas kuliah oleh kelompok 6.</p>
		</div>
	</div>
	<div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle" src="https://i.ibb.co/c1ZV592/foto1.jpg" alt="Generic placeholder image" width="140" height="140">
				<br>
				<br>
				<h2>Analisis</h2>
				<h3>Yezhkiel Sibarani</h3>
				<br>
				<br>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="https://i.ibb.co/bbWjgt4/foto2.jpg" alt="Generic placeholder image" width="140" height="140">
				<br>
				<br>
				<h3>Project Manager</h3>
				<h2>Nova Sidabutar</h2>
				<br>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="https://i.ibb.co/fMySq5c/foto3.jpg" alt="Generic placeholder image" width="140" height="140">
				<br>
				<br>
				<h2>Tester</h2>
				<h2>Dian Hasibuan</h2>
				<br>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="https://i.ibb.co/xHsx6Y1/foto4.jpg" alt="Generic placeholder image" width="140" height="140">
				<br>
				<br>
				<h2>Programmer</h2>
				<h2>Genesis Sinaga</h2>
				<br>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="https://i.ibb.co/ZWDDsNJ/foto5.jpg alt=" Generic placeholder image" width="140" height="140">
				<br>
				<br>
				<h2>Designer</h2>
				<h2>Agnes Turnip</h2>
				<br>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->
	</div>
	<br>
	<br>
	</div>
	<?php include('includes/footer.php'); ?>
	<!-- signup -->
	<?php include('includes/signup.php'); ?>
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php'); ?>
	<!-- //signin -->
	<!-- write us -->
	<?php include('includes/write-us.php'); ?>
	<!-- //write us -->
</body>

</html>