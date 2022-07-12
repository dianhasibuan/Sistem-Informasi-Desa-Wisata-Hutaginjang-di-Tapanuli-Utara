<?php
session_start();
error_reporting(0);
include('includes/config.php');
function getName($id)
{
    global $dbh;
    $sql = "SELECT * FROM tbltourpackages WHERE PackageId=:pid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            return $result->PackageName;
        }
    }
}

function getStatus($id)
{
    global $dbh;
    $sql = "SELECT * FROM tblbooking WHERE BookingId=:bid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bid', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($results[0]->status ==  0) {
        return "Pending";
    } elseif ($results[0]->status ==  1) {
        return "Confirmed";
    } elseif ($results[0]->status == 2 and  $results[0]->CancelledBy == 'u') {
        return "Canceled by you at " . $results[0]->UpdationDate;
    } elseif ($results[0]->status == 2 and $results[0]->CancelledBy == 'a') {
        return "Canceled by admin at " . $results[0]->UpdationDate;
    }
}

function getCustomerName($email)
{
    global $dbh;
    $sql = "SELECT * FROM tblusers WHERE EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            return $result->FullName;
        }
    }
}
