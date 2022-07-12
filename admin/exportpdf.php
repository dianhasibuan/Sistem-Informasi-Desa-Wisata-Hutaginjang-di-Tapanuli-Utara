<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../includes/functions.php');
require_once("../includes/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$sql = "SELECT tblbooking.*, tblbooking.UpdationDate as updtat, tbltourpackages.PackageName, tblusers.* FROM tblbooking join tbltourpackages on tblbooking.PackageId=tbltourpackages.PackageId join tblusers on tblbooking.UserID=tblusers.id";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$html = '<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tour Booking Data | Package Details</title>
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
            <span style="font-size: 20px; font-weight: bold;">Tour Booking Data | Package Details</span>
        </center>
    </div>
    <div class="p-3 mx-3">
    <table border="1">
        <tr>
            <th>#</th>
            <th>Booking Id</th>
            <th>Package Name</th>
            <th>From</th>
            <th>To</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Booking Date</th>
            <th>Payment Method</th>
        </tr>';
$no = 1;
foreach ($results as $result) {
    $html .= '<tr>
            <td>' . $no . '</td>
            <td>#BK' . $result->BookingId . '</td>
            <td>' . $result->PackageName . '</td>
            <td>' . $result->FromDate . '</td>
            <td>' . $result->ToDate . '</td>
            <td>' . $result->Comment . '</td>
            <td>' . getStatus($result->Status) . '</td>
            <td>' . $result->RegDate . '</td>
            <td>' . $result->paymentmethod . '</td>
        </tr>';
    $no++;
}
$html .= '</table>
    </div>
</body>
</html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('data-user.pdf', array('Attachment' => 0));
