<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']['id']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['bkid'])) {
		$bid = $_REQUEST['bkid'];
		$email = $_SESSION['login'];
		$status = 2;
		$cancelby = 'u';
		$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE BookingId=:bid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':cancelby', $cancelby, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':bid', $bid, PDO::PARAM_STR);
		$query->execute();
		if ($query) {
			echo "<script>alert('Pemesanan berhasil dibatalkan');</script>";
			echo "<script>window.location.href='history.php';</script>";
		} else {
			echo "<script>alert('Pemesanan gagal dibatalkan');</script>";
		}
	}
?>
	<!DOCTYPE HTML>

	<head>
		<title>Website Desa Wisata Hutaginjang</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Tourism Management System In PHP" />
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

		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>
	</head>

	<body>
		<!-- top-header -->
		<div class="top-header">
			<?php include('includes/header.php'); ?>
			<div class="banner-1 ">
				<div class="container">
					<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Website Desa Wisata Hutaginjang</h1>
				</div>
			</div>
			<!--- /banner-1 ---->
			<!--- privacy ---->
			<div class="privacy">
				<div class="container">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Tour History</h3>
					<form method="post" onSubmit="return valid();">
						<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
						<p>
						<table border="1" width="100%">
							<tr align="center">
								<th>#</th>
								<th>Booking Id</th>
								<th>Package Name</th>
								<th>From</th>
								<th>To</th>
								<th>Comment</th>
								<th>Status</th>
								<th>Booking Date</th>
								<th>Payment Method</th>
								<th>Payment Proof</th>
								<th>Action</th>
							</tr>
							<?php

							$userid = $_SESSION['login']['id'];
							$sql = "SELECT tblbooking.*, tbltourpackages.PackageName from tblbooking join tbltourpackages ON tblbooking.PackageId=tbltourpackages.PackageId WHERE tblbooking.UserID=:userid order by BookingId desc";
							$query = $dbh->prepare($sql);
							$query->bindParam(':userid', $userid, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {	?>
									<tr align="center">
										<td><?php echo htmlentities($cnt); ?></td>
										<td>#BK<?php echo htmlentities($result->BookingId); ?></td>
										<td><a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>"><?php echo htmlentities($result->PackageName); ?></a></td>
										<td><?php echo htmlentities($result->FromDate); ?></td>
										<td><?php echo htmlentities($result->ToDate); ?></td>
										<td><?php echo htmlentities($result->Comment); ?></td>
										<td><?php if ($result->status == 0) {
												echo "Pending";
											}
											if ($result->status == 1) {
												echo "Confirmed";
											}
											if ($result->status == 2 and  $result->CancelledBy == 'u') {
												echo "Canceled by you at " . $result->UpdationDate;
											}
											if ($result->status == 2 and $result->CancelledBy == 'a') {
												echo "Canceled by admin at " . $result->UpdationDate;
											}
											?></td>
										<td><?php echo htmlentities($result->RegDate); ?></td>
										<td><?php if ($result->paymentmethod == null) {
												echo "-";
											} else {
												echo htmlentities($result->paymentmethod);
											} ?></td>
										<td><?php if ($result->paymentproof == null) {
												echo "-";
											} else { ?>
												<img src="images/<?php echo htmlentities($result->paymentproof); ?>" width="100" height="100">
											<?php } ?>
										</td>

										<td>
											<div class="btn-group">
												<?php if ($result->status == 2) {
												?>Cancelled
											<?php } elseif ($result->status == 0) { ?>
												<a href="history.php?bkid=<?php echo htmlentities($result->BookingId); ?>" onclick="return confirm('Do you really want to cancel booking')">
													Cancel
												</a>
												<?php
													if ($result->paymentmethod != null) { ?>
													<a href="pdf.php?bkid=<?php echo htmlentities($result->BookingId); ?>">Export to PDF</a>
												<?php } else { ?>
													<a href="payment.php?bkid=<?php echo htmlentities($result->BookingId); ?>">
														Bayar Sekarang
													</a>
												<?php } ?>
											<?php } ?>
											</div>
										</td>
									</tr>
							<?php $cnt++;
								}
							} ?>
						</table>
						</p>
					</form>
				</div>
			</div>
			<!--- /privacy ---->
			<!--- footer-top ---->
			<!--- /footer-top ---->
			<?php include('includes/footer.php'); ?>
			<!-- signup -->
			<?php include('includes/signup.php'); ?>
			<!-- //signu -->
			<!-- signin -->
			<?php include('includes/signin.php'); ?>
			<!-- //signin -->
			<!-- write us -->
			<?php include('includes/write-us.php'); ?>
	</body>

	</html>
<?php } ?>