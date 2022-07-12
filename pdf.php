<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/functions.php');
require_once("includes/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$bkid = $_GET['bkid'];
$email = $_SESSION['login'];
$sql = "SELECT * from tblbooking where BookingId=:bkid and UserEmail=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':bkid', $bkid, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$html = '<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tour Booking Details | Package Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9vh;
        }
    </style>
</head>
<body>
    <div style="display: flex;">
        <center>
            <span style="font-size: 20px; font-weight: bold;">Huta Ginjang</span>
        </center>
    </div>
    <div class="p-3 mx-3">
        <table>
            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td>' . getCustomerName($results[0]->FullName) . '</td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>:</td>
                <td>' . $results[0]->RegDate . '</td>
            </tr>
            <tr>
                <td>Booking ID</td>
                <td>:</td>
                <td>#BK' . $results[0]->BookingId . '</td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td>' . getName($results[0]->PackageId) . '</td>
            </tr>
            <tr>
                <td>Dari Tanggal</td>
                <td>:</td>
                <td>' . $results[0]->FromDate . '</td>
            </tr>
            <tr>
                <td>Sampai Tanggal</td>
                <td>:</td>
                <td>' . $results[0]->ToDate . '</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>' . getStatus($results[0]->BookingId) . '</td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td>:</td>
                <td>' . $results[0]->Comment . '</td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td>:</td>
                <td>' . $results[0]->PaymentMethod . '</td>
            </tr>
            <tr>
                <td>Bukti Pembayaran</td>
                <td>:</td>
                <td>' . $results[0]->PaymentProof . '</td>
            </tr>
        </table>
        <hr class="my-3">
    </div>
</body>
</html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Tour Booking Details.pdf", array("Attachment" => false));
