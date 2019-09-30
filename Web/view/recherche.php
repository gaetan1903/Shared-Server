<!DOCTYPE html>
<html lang="en-US">


<!-- page-out-team01:28-->
<head>
	<meta charset="utf-8"/>
	<title>Recherche</title>
	<link rel="icon" type="image/png" href="public/img/fav.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CPoppins:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext" rel="stylesheet">
	<!-- animate -->
	<link rel="stylesheet" href="public/css/animate.css" />
	<!-- owl Carousel assets -->
	<link href="public/css/owl.carousel.css" rel="stylesheet">
	<?php
	require("public/link_bt/link_bt_acceuil.html");
	?>
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
	<link rel="stylesheet" type="text/css" href="public/css/app.css">
	<link rel="stylesheet" type="text/css" href="public/css/recherche.css">
	<?php
	require("public/style/style_acceuil.html");
	?>

	
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
									<a id="logo" href="#" class="d-inline-block margin-tb-15px"><img src="" alt=""></a>
									<a class="mobile-toggle padding-8px background-white border-radius-100" href="#"><i class="fa fa-bars"></i></a>
								</div>
								<div class="col-lg-2 col-md-12 position-inherit">
									<ul id="menu-main" class="nav-menu float-xl-right text-lg-center link-padding-tb-25px dropdown-dark">
										
										<li class="nav-item"> <a href="#"  class="op"><i class="icon text-main-color fa fa-arrow-left"><h5 style="display: inline"> Retour</h5></i></a></li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


    <div class="nile-about-section">
		<div class="container">
			<!-- Title -->
			<div class="section-title margin-bottom-40px">
				<div class="row justify-content-center">
					<div class="col-lg-7">
					</div>
				</div>
			</div>
			<!-- // End Title -->



			<div class="row">

				<div class="col-lg-3 col-md-6">
					<div class="team layout-2">
						<br><br>
                        <ul class="social-list">
							<li><a href="#"><i class="fa fa-file" aria-hidden="true"></i></a></li>
						</ul>
						<div class="padding-20px">
							<h3>Fichiers</h3>

							<?php
								while($name = $all_user_names->fetch()){
									$names[] = $name["user_name"];
								}
								$nbr = count($names);

								while($results_file = $search_file->fetch()){
									$reslt_file = $results_file['file_name'];
									$file_groupe = $results_file['groupe_name'];

									for($i=0; $i<=$nbr; $i++){
										$name = $names[$i];
										if($name == $file_groupe or $file_groupe == "".$name."_pdp"){
											$user_prop = 'true';
											break;
										}
										elseif($name != $file_groupe){
											$user_prop = 'false';
										}	
									}															
									
									if($user_prop == 'true'){
										?>
											<div class="jop"><?= $reslt_file ?> appartient à <?= $file_groupe ?></div>
										<?php
									}
									else{
										?>
											<div class="jop"><?= $reslt_file ?> dans le groupe
											<a href="index.php?action=rejoindre_groupe&amp;user_name=<?= $user_name ?>&amp;id=<?= $id ?>&amp;groupe_name=<?= $file_groupe ?>"> <?= $file_groupe ?></a></div>
										<?php

									}
									

								}

							?>

						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-6">
					<div class="team layout-2">
					<br><br>
                        <ul class="social-list">
							<li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
						</ul>
						<div class="padding-20px">
							<h3>Groupes</h3>
								<?php
									while($results_groupe = $search_groupe->fetch()){
										$reslt_groupe = $results_groupe['name_groupe'];
										?>
											<div class="jop"><?= $reslt_groupe ?> </div>
										<?php
									}
								?>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-6">
					<div class="team layout-2">
					<br><br>
                        <ul class="social-list">
							<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						</ul>
						<div class="padding-20px">
							<h3>Membres</h3>
								<?php
									while($results_user = $search_user->fetch()){
										$reslt_user = $results_user['user_name'];
										?>
											<div class="jop"><?= $reslt_user ?> </div>
										<?php
									}
								?>
						</div>
					</div>
				</div>


			</div>

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

<script src="../public/js/YouTubePopUp.jquery.js"></script>

<script src="../public/js/imagesloaded.min.js"></script>
<script src="../public/js/custom.js"></script>
<script src="../public/js/popper.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>


