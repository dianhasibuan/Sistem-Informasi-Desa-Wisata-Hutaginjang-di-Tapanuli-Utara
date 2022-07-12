<?php
session_start();
error_reporting(1);
include('includes/config.php');
// AMBIL DATA LOKASI DARI DATABASE
$lokasi = "SELECT p.PackageName FROM tbltourpackages p LEFT JOIN tblbooking b ON p.PackageId = b.PackageId";
$query = $dbh->prepare($lokasi);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$array_lokasi = array();
foreach ($results as $result) {
	$array_lokasi[] = $result->PackageName;
}
$pengujung = "SELECT COUNT(DISTINCT b.UserId) AS jumlah, p.PackageName FROM tblbooking b LEFT JOIN tbltourpackages p ON b.PackageId = p.PackageId group by b.PackageId";
$query = $dbh->prepare($pengujung);
$query->execute();
$results2 = $query->fetchAll(PDO::FETCH_OBJ);
$array_pengujung = array();
foreach ($results2 as $result2) {
	array_push($array_pengujung, intval($result2->jumlah));
}
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
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
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
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Graphic </h1>
		</div>

	</div>
	<div class="jumbotron">
		<div class="container">
			<canvas id="myChart" width="400" height="400"></canvas>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		const ctx = document.getElementById('myChart').getContext('2d');
		const myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($array_lokasi); ?>,
				datasets: [{
					label: 'Jumlah Pengunjung',
					data: <?php echo json_encode($array_pengujung); ?>,
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
</body>

</html>