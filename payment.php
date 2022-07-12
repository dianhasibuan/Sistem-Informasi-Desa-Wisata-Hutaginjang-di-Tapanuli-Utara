<?php
session_start();
error_reporting(0);
include('includes/config.php');
$bkid = intval($_GET['bkid']);
if (isset($_POST['submit'])) {
    $paymentmethod = $_POST['paymentmethod'];
    $paymentproof = time() . '.' . explode('.', $_FILES['paymentproof']['name'])[1];
    $paymentproof_tmp = $_FILES['paymentproof']['tmp_name'];
    move_uploaded_file($paymentproof_tmp, "images/$paymentproof");
    $sql = "UPDATE tblbooking SET paymentmethod=:paymentmethod, paymentproof=:paymentproof WHERE BookingId=:bkid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':paymentmethod', $paymentmethod, PDO::PARAM_STR);
    $query->bindParam(':paymentproof', $paymentproof, PDO::PARAM_STR);
    $query->bindParam(':bkid', $bkid, PDO::PARAM_STR);
    $query->execute();
    if ($query) {
        echo "<script>alert('Pembayaran berhasil dikonfirmasi');</script>";
        echo "<script>window.location.href='history.php';</script>";
    } else {
        echo "<script>alert('Pembayaran gagal dikonfirmasi');</script>";
    }
}
?>
<!DOCTYPE HTML>

<head>
    <title>Website Desa Wisata Hutaginjang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme files -->
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
    </div>
    <!-- top-header -->
    <!--- selectroom ---->
    <div class="selectroom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 wow fadeInLeft animated mb-5" data-wow-delay=".5s">
                    <h2>Pembayaran</h2>
                    <h4>Metode Pembayaran</h4>
                    <div class="mt-2">
                        <span>Mandiri</span>
                        <p>No. Rekening : 123456789</p>
                        <p>Atas Nama : PT. Desa Wisata Hutaginjang</p>
                    </div>
                    <div class="mt-3">
                        <span>DANA</span>
                        <p>No. DANA : 123456789</p>
                        <p>Atas Nama : PT. Desa Wisata Hutaginjang</p>
                    </div>
                </div>
                <div class="col-md-8 wow fadeInRight animated" data-wow-delay=".5s">
                    <div class="">
                        <h4>Pembayaran</h4>
                        <?php if ($error) { ?>
                            <div class="errorWrap">
                                <strong>ERROR</strong>: <?php echo htmlentities($error); ?>
                            </div>
                        <?php } else if ($msg) { ?>
                            <div class="succWrap">
                                <strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?>
                            </div>
                        <?php } ?>
                        <div class="">
                            <h5>Pembayaran</h5>
                            <p>Silahkan upload bukti pembayaran anda</p>
                            <div class="">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="paymentmethod">Metode Pembayaran</label>
                                        <select name="paymentmethod" id="paymentmethod" class="form-control">
                                            <option value="">Pilih Metode Pembayaran</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="DANA">DANA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentproof">Bukti Pembayaran</label>
                                        <input type="file" name="paymentproof" id="paymentproof" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- write us -->
    <?php include('includes/write-us.php'); ?>
</body>

</html>