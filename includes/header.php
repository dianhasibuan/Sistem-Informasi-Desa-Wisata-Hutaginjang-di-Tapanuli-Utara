<?php
if ($_SESSION['login']) { ?>
	<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
		<div class="container">
			<div class="navigation">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav class="cl-effect-1">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Beranda</a></li>
								<li><a href="package-list.php">Objek Wisata</a></li>
								<li><a href="graphic.php">Grafik</a></li>
								<li><a href="aboutus.php">Tentang</a></li>
								<li class="prnt"><a href="history.php">Histori Pesanan</a></li>
								<li class="prnt"><a href="profile.php">Profil Saya</a></li>
								<li class="prnt"><a href="change-password.php">Ubah Password</a></li>
								<?php if ($_SESSION['login']) { ?>
									<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
										<li>
										<li class="tol">Hallo </li>
										<li class="sig"><?php echo htmlentities($_SESSION['login']['email']); ?></li>
										</li>
									</ul>
								<?php } else { ?>
								<?php
								} ?>
								<div class="clearfix"></div>
							</ul>
							<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
								<li class="sigi"><a href="logout.php">Logout</a></li>
							</ul>
						</nav>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php } else { ?>

	<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
		<div class="container">
			<div class="navigation">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav class="cl-effect-1">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Beranda</a></li>
								<li><a href="package-list.php">Objek Wisata</a></li>
								<li><a href="graphic.php">Grafik</a></li>
								<li><a href="aboutus.php">Tentang</a></li>
								<!-- <input type="text" placeholder="Search.."> -->
							</ul>
							<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
								<li type="button" class="sigi"><a href="#" data-toggle="modal" data-target="#myModal">Register</a></li>
								<li type="button" class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">Login</a></li>
							</ul>
						</nav>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>

<?php } ?>
<!--- /top-header ---->
<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">

</ul>
</ul>
<!--- footer-btm ---->