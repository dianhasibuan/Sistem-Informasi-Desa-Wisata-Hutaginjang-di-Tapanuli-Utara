<?php

session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tour Booking Data | Package Details</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pengungjung Objek Wisata Hutaginjang.xls");
    ?>
    <center>
        <span style="font-size: 20px; font-weight: bold;">Tour Booking Data | Package Details</span>
    </center>
    <table border="1">
        <thead>
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
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT tblbooking.*, tblbooking.UpdationDate as updtat, tbltourpackages.PackageName, tblusers.* FROM tblbooking join tbltourpackages on tblbooking.PackageId=tbltourpackages.PackageId join tblusers on tblbooking.UserID=tblusers.id";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            foreach ($results as $result) {
            ?>
                <tr>
                    <td><?php echo $cnt; ?></td>
                    <td>#BK<?php echo $result->BookingId; ?></td>
                    <td><?php echo $result->PackageName; ?></td>
                    <td><?php echo $result->FromDate; ?></td>
                    <td><?php echo $result->ToDate; ?></td>
                    <td><?php echo $result->Comment; ?></td>
                    <td><?php echo getStatus($result->status); ?></td>
                    <td><?php echo $result->RegDate; ?></td>
                    <td><?php echo $result->paymentmethod; ?></td>
                </tr>
            <?php
                $cnt++;
            }
            ?>
        </tbody>
    </table>

    <center>
        <h2>Tertanda Admin</h2>
    </center>
</body>

</html>