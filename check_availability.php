<?php
require_once("includes/config.php");
// code admin email availablity
if (!empty($_POST["emailid"])) {
	$email = $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo "error : Anda tidak menginput email yang valid";
	} else {
		$sql = "SELECT EmailId FROM tblusers WHERE EmailId=:email";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		$cnt = 1;
		if ($query->rowCount() > 0) {
			echo "<span style='color:red'> Email sudah ada.</span>";
			echo "<script>$('#submit').prop('disabled',true);</script>";
		} else {

			echo "<span style='color:green'> Email tersedia untuk registrasi .</span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	}
}