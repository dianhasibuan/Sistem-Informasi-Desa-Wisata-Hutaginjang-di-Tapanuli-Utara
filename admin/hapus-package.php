<?php
include('includes/config.php');

$id = $_GET["id"];

$query = "DELETE FROM TblTourPackages where PackageId = '$id'";
$hasil = $dbh->prepare($query);
$hasil->execute();

if ($hasil) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    echo "<script>window.location.href='manage-packages.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');</script>";
    echo "<script>window.location.href='manage-packages.php';</script>";
}
