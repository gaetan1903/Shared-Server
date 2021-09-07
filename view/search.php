<!DOCTYPE html>
<html lang="en-US">


<!-- page-out-team01:28-->
<head>
	<meta charset="utf-8"/>
	<title>Notre équipe</title>
	<link rel="icon" type="image/png" href="../public/img/fav.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CPoppins:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext" rel="stylesheet">
	<!-- animate -->
	<link rel="stylesheet" href="../public/css/animate.css" />
	<!-- owl Carousel assets -->
	<link href="../public/css/owl.carousel.css" rel="stylesheet">
	<link href="../public/css/owl.theme.css" rel="stylesheet">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<!-- hover anmation -->
	<link rel="stylesheet" href="../public/css/hover-min.css">
	<!-- flag icon -->
	<link rel="stylesheet" href="../public/css/flag-icon.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../public/css/style.css">
	<!-- elegant icon -->
	<link rel="stylesheet" href="../public/css/elegant_icon.css">

	<!-- jquery library  -->
	<script src="../public/js/jquery-3.2.1.min.js"></script>
	<!-- fontawesome  -->
	<link rel="stylesheet" href="../public/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/team.css">
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
										<li class="has-dropdown"><a href="../index.php"><b>Accueil</b></a>
										</li>
										<li class="has-dropdown"><a href="#"><b>A propos </b></a>
											<ul class="sub-menu">
											    <li><a href="fonction.php">A propos de Shared-server</a></li>
											    <li><a href="team.php">Notre équipe</a></li>											  
											</ul>
										</li>
										<li class="has-dropdown"><a href="gallery.php"><b>Gallérie </b></a>
										</li>
										<li class="has-dropdown"><a href="contact.php"><b>Nous Contacter </b></a>
										</li>
										<li class="has-dropdown"><a href="#"><b>Téléchargement</b></a>
											<ul class="sub-menu">
												<li><a href="#">Télécharger Shared-server pour Linux</a></li>
												<li><a href="#">Télécharger Shared-server pour Windows</a></li>
											</ul>
										</li>
									</ul>
									<div class="d-none d-xl-block pull-right model-link margin-top-15px">
										<a id="cart-link" class="model-link margin-right-25px text-dark opacity-hover-8" href="../index.php?action=inscrire">
                                        							<span></span><i class="fa fa-plus"></i>
                              							</a>
									</div>
								</div>
								<div class="col-lg-2 col-md-12  d-none d-lg-block">
									<a data-toggle="modal" data-target=".bd-example-modal-lg" href="#" class="btn btn-sm border-radius-30 margin-tb-12px text-dark  background-white  box-shadow float-right padding-lr-20px margin-left-30px d-block">
                          <i class="fa fa-sign-in margin-right-10px"></i>  Se connecter
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


    <!-- Se connecter -->
    <div class="modal contact-modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content margin-top-150px background-main-color">
                <div class="row no-gutters">

                    <div class="col-lg-7">
                        <div class="padding-30px">
                            <h3 class="padding-bottom-15px">Se connecter</h3>
                            <form method="POST" action="../index.php?action=se_connecter" >
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Entrez votre adresse Email</label>
                                        <input type="text" class="form-control" id="inputName4" placeholder="Nom d'utilisateur ou adresse email" name="name_or_email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label> Entrez votre mot de passe</label>
                                        <input type="password" class="form-control" id="inputEmail4" placeholder="Mot de passe" name="passwd" required>
                                    </div>
                                </div>
                                <input type="submit" name="submit" value="SE CONNECTER"/>
                                <a href="oublier.html"> <h4> Mot de passe oublié ?</h4></a>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if(isset($verify)){       
                    if($verify == 'error')
                    {                           
                        echo '<font color="red">Nom d\'utilisateur incorrecte</font>';
                    }
                    elseif($verify == 'error_mdp'){
                        echo '<font color="red">Mot de passe incorrecte</font>';
                    }
                }
            ?>
        </div>
    </div>
    <!-- // Se connecter  -->


	<div class="page-title">
		<div class="container">
			<div class="padding-tb-120px">
				<h1>Notre Equipe</h1>
				<ol class="breadcrumb">
					<li><a href="ss1.html">Accueil</a></li>
					<li class="active">Notre Equipe</li>
				</ol>
			</div>
		</div>
	</div>


	<div class="nile-about-section">
		<div class="container">
			<!-- Title -->
			<div class="section-title margin-bottom-40px">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="icon text-main-color"> RESULTATS</div>
						<div class="h2">RECHERCHE</div>
					</div>
				</div>
			</div>
			<!-- // End Title -->



			<div class="row">

				<div class="col-lg-3 col-md-6">
					<div class="team layout-2">
                        <ul class="social-list">
							<li><a href="#"><i class="fa fa-file" aria-hidden="true"></i></a></li>
						</ul>
						<div class="padding-20px">
							<h3>Fichiers</h3>
							<div class="jop">Fichier1</div>
                            <div class="jop">Fichier2</div>
                            <div class="jop">Fichier3</div>
                            <div class="jop">Fichier4</div>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-6">
					<div class="team layout-2">
                        <ul class="social-list">
							<li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
						</ul>
						<div class="padding-20px">
							<h3>Groupes</h3>
							<div class="jop">Groupe1</div>
                            <div class="jop">Groupe2</div>
                            <div class="jop">Groupe3</div>
                            <div class="jop">Groupe4</div>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-6">
					<div class="team layout-2">
                        <ul class="social-list">
							<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
						</ul>
						<div class="padding-20px">
							<h3>Membres</h3>
							<div class="jop">Membre1</div>
                            <div class="jop">Membre2</div>
                            <div class="jop">Membre3</div>
                            <div class="jop">Membre4</div>
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


<!-- page-out-team01:31-->
</html>
