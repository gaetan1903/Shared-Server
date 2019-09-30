<!DOCTYPE html>
<html lang="en-US">


<!-- page-out-team01:28-->
<head>
	<title>Profile</title>
	<link rel="icon" type="image/png" href="public/img/fav.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CPoppins:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext" rel="stylesheet">
	<!-- animate -->
	<link rel="stylesheet" href="public/css/animate.css" />
	<!-- owl Carousel assets -->
	<link href="public/css/owl.carousel.css" rel="stylesheet">
	<link href="public/css/owl.theme.css" rel="stylesheet">
	<!-- bootstrap -->
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<!-- hover anmation -->
	<link rel="stylesheet" href="public/css/hover-min.css">
	<!-- flag icon -->
	<link rel="stylesheet" href="public/css/flag-icon.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="public/css/style.css">
	<!-- elegant icon -->
	<link rel="stylesheet" href="public/css/elegant_icon.css">

	<!-- jquery library  -->
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<!-- fontawesome  -->
	<link rel="stylesheet" href="public/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/pro.css">
</head>


<body>
	<!--  Header  -->
	<header class="background-white">
		<div class="header-output">
			<div class="header-output">
				<div class="header-in">
					<div class="container">
						<div class="position-relative">
							<div class="row">
								<div class="col-lg-3 col-md-12">
									<a id="logo" href="home-1.html" class="d-inline-block margin-tb-15px"><img src="" alt=""></a>
									<a class="mobile-toggle padding-15px background-white border-radius-50" href="#"><i class="fa fa-bars"></i></a>
								</div>
								<div class="col-lg-7 col-md-12 position-inherit">
									<ul id="menu-main" class="nav-menu float-xl-left text-lg-center link-padding-tb-25px dropdown-dark">
										<li class="has-dropdown"><a href="index.php?action=connecter&amp;user_name=<?= $user_name;?>&amp;id=<?= $id;?>"><b>Accueil</b></a>
										</li>
										<li class="has-dropdown"><a href="#"><b>Téléchargement</b></a>
											<ul class="sub-menu">
												<li><a href="#">Télécharger Shared-server pour Linux</a></li>
												<li><a href="#">Télécharger Shared-server pour Windows</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="col-lg-2 col-md-12  d-none d-lg-block">
									<a data-toggle="modal" data-target=".bd-example-modal-lg" href="#" class="btn btn-sm border-radius-30 margin-tb-12px text-dark  background-white  box-shadow float-right padding-lr-20px margin-left-30px d-block">
                          								<i class="fa fa-sign-out margin-right-10px"></i>  Deconnexion
                        							</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- // Header  -->


	<div class="nile-about-section">
		<div class="container">
			<!-- Title -->
			<div class="section-title margin-bottom-40px">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="icon text-main-color"> Profile</div>
						<div class="h2">UTILISATEUR</div>
					</div>
				</div>
			</div>
			<!-- // End Title -->
			<div class="row">
				<div class="ntsoa">
					<div class="col-lg-8 col-md-6">
						<div class="team layout-2">
							<div class="img-team">
								<?php
									if(isset($pdp_user)){
								?>
									<img src=<?= $chemin_pdp ?> alt="">
								<?php
									}
									else{
								?>
									<img src="../public/image/av.png" alt="">
								<?php
									}
								?>
							</div>
							<div class="padding-20px">
								<?php
									if(isset($nom_complet) or isset($prenom)){
										?>
											<i class="fa fa-user"></i><h3><?php echo "$nom_complet $prenom" ?></h3>
										<?php
									}
								?>
								<i class="fa fa-user"></i><h3><?= $user_name ?></h3>
								<i class="fa fa-google-plus"> </i><h3><?= $email ?></h3>
									<?php
										if(isset($phone)){
												?>
													<i class="fa fa-mobile-phone"></i><h3 > Numéro Téléphone</h3>
													<h3><?= $phone ?></h3>
												<?php
											}
									?>

								<ul class="social-list">
									<li><a class="modif_pro" href="index.php?action=modif_pro&amp;user_name=<?= $user_name ?>&amp;id=<?= $id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- // End Row-->
		</div>
	</div>


	<footer class="layout-dark">
		<div class="copy-right">
			<div class="container padding-tb-50px">
				<div class="row">
					<div class="col-lg-6">
						<div class="copy-right-text text-lg-left text-center sm-mb-15px"><a target="_blank" href="https://shared-server.esti.mg">Shared-server</a> </div>
					</div>
					<div class="col-lg-6">
						<!--  Social -->
						<ul class="social-media list-inline text-lg-right text-center margin-0px text-white">
							<li class="list-inline-item"><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
						<!-- // Social -->
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="public/js/YouTubePopUp.jquery.js"></script>
	<script src="public/js/owl.carousel.min.js"></script>
	<script src="public/js/imagesloaded.min.js"></script>
	<script src="public/js/custom.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>

</body>


<!-- page-out-team01:31-->
</html>