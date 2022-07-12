<?php
error_reporting(1);
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$mnumber = $_POST['mobilenumber'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "INSERT INTO tblusers SET FullName = :fname, MobileNumber = :mnumber, EmailId = :email, Password = :password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':fname', $fname, PDO::PARAM_STR);
	$query->bindParam(':mnumber', $mnumber, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$_SESSION['msg'] = "Akun Anda sudah berhasil di daftar. Sekarang Anda dapat Login";
		header('location:index.php');
	} else {
		$_SESSION['msg'] = "Something went wrong. Please try again.";
		header('location:index.php');
	}
}
?>
<!--Javascript for check email availabilty-->
<script>
	function checkAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_availability.php",
			data: 'emailid=' + $("#email").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<section>
				<div class="modal-body modal-spa">
					<div class="login-grids">
						<div class="login">
							<div class="login-left">
								<ul>
									<li><a class="fb" href="admin/index.php"><i></i>Login Admin</a></li>

								</ul>
							</div>
							<div class="login-right">
								<form name="signup" method="post">
									<h3>Daftar Akun Anda</h3>

									<input type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" required="">
									<input type="text" value="" placeholder="Mobile number" maxlength="12" name="mobilenumber" autocomplete="off" required="" pattern="^\d{12}$">
									<input type="text" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off" required="">
									<span id="user-availability-status" style="font-size:12px;"></span>
									<input type="password" value="" placeholder="Password" name="password" required="">
									<input type="submit" name="submit" id="submit" value="Register">
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
						<p>By logging in you agree to our Terms and Conditions and Privacy Policy</p>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>