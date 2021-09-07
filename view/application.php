<?php
session_start();
$id = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

if(isset($_GET['action']) and isset($_GET['id']) and isset($_GET['user_name'])){
    $action = htmlspecialchars($_GET['action']);
    $id_get = htmlspecialchars($_GET['id']);
    $user_name_get = htmlspecialchars($_GET['user_name']);

    if(($action == 'connecter' or $action == 'my_groupe') and $id_get == $id and $user_name == $user_name_get){
        $title = "Shared-Server";
        ob_start();
        require("public/link_bt/link_bt_acceuil.html");
        $entete = ob_get_clean();
        ob_start();
        require("public/style/style_acceuil.html");
        $style = ob_get_clean();
        ob_start();
        ?>

<!DOCTYPE html>
<html lang="en-US">


<!-- page-out-team01:28-->
<head>
	<meta charset="utf-8"/>
	<title>Application</title>
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
								<div class="col-lg-7 col-md-12 position-inherit">
									<ul id="menu-main" class="nav-menu float-xl-right text-lg-center link-padding-tb-25px dropdown-dark">
										<li class="nav-item"> <a href="#"  class="op"><i class="icon text-main-color fa fa-circle"  onclick="openNav2()"><h5 style="display: inline"> Membres active</h5></i></a></li>
										<li class="nav-item"> <a href="#"  class="op"><i class="icon text-main-color fa fa-sliders"  onclick="openNav()"><h5 style="display: inline"> Menu</h5></i></a></li>
										<li class="nav-item">
											<form class="form-inline md-form form-sm active-white-2 mt-2" action="index.php?action=rechercher&amp;user_name=<?= $user_name ?>&amp;id=<?= $id ?>" method="POST">
												<input  type="text" name="search" placeholder="Rechercher " aria-label="Search" required>
												<input type="submit" name="rechercher" value="Rechercher" />
												
											</form>
										</li>
										<li class="nav-item"><a href="#" class="nav-link notifications"><i class="icon text-main-color fa fa-bell"></i><span class="badge">5</span></a></li>
										<li class="nav-item"><a href="#" class="nav-link messages"><i class="icon text-main-color fa fa-comment"></i><span class="badge">2</span></a></li>
										<li class="has-dropdown"><a href="#" class="nav-link user-action">


											<?php
												if(isset($pdp_user)){
											?>
												<img src=<?= $chemin_pdp ?>  class="avatar" alt="Avatar">
											<?php
												}
												else{
											?>
												<img src="public/image/av.png"  class="avatar" alt="Avatar"> 
											<?php
												}
											?>
				
											<strong><?= $user_name ?></strong> </a>
											<ul class="sub-menu">
												<li><a href="index.php?action=profil&user_name=<?= $user_name ?>&id=<?= $id ?>" ><i class="fa fa-user-o"></i> Profil</a></li>
												<li><a href="index.php?action=se_deconnecter&amp;user_name=<?= $user_name ?>"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
											</ul>
										</li>
										
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
						<div class="icon text-main-color">
							<?php
								if(isset($user_files)){
									echo "VOS FICHIERS";
								}
								else{
									echo "LES FICHIERS DE GROUPE";
								}
							?>
						</div>
						<div class="h2">
							<?php
								if(isset($user_files)){
									echo $user_name;
								}
								else{
									echo $affichage_files_groupe;
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- // End Title -->
		
			<div class="row">					
				<div class="col-lg-3 col-md-6">
					<div class="team layout-2">
						<ul class="social-list">
							<li><a href="#myModal_fichier" data-toggle="modal"><i class="fa fa-file" aria-hidden="true"></i> <i class="fa fa-plus" aria-hidden="true"></i> <h4 style="display:inline">Ajouter un fichier</h4></a></li>
						</ul>
					</div>
				</div>

				<?php

					function affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe){
					?>

						<div class="team layout-2">
							<div class="img-team">
								<div class="img-team"><br>
									<img src="public/image/LOGO_FICHIERS/<?= $img ?>" alt="">
								</div>	
							</div>
							<br>
							<div class="padding-20px">
								<h3><?= $name_modify ?></h3>
								<h3>Propriétaire: <?= $user_name_modify ?></h3>
								<h3>Groupe: <?= $groupe_modify ?></h3>
								<h3>Date upload: <?= $date_upload_file ?></h3>
							</div>
							<ul class="social-list">
								<li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
								<?php
								if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop ){
									?>			
										<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&droit_suppr=<?= $droit_suppression ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
									<?php
								}
								elseif($user_name==$createur_groupe){
									?>
										<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
									<?php
								}

								?>
												
							</ul>
						</div>
					

					<?php
										
					}

					$i = 0; foreach ($files as $file): 
				?>
				<div class="col-lg-3 col-md-6">
				<?php							
					$name_file = $file['file_name'];
					$name_prop = $file['user_name'];
					$groupe_file = $file['groupe_name'];
					$date_upload_file = $file['date_upload'];
					$description_file = $file['description_file'];

					if(isset($affichage_files_groupe)){
						$destination = "public/stockage/groupe/$groupe_file/$name_file";
						$type = "groupe";
						
					}
					else{
						$destination = "public/stockage/users/$user_name/$name_file";
						$type = "user";
					}

					$extension_fic = array(	'XML', 'h');
					$extension_image = array('bmp', 'gif', 'iso', 'jpeg', 'jpg', 'png', 'eps', 'psd', 'psp', 'tif', 'tiff');
					$extension_audio = array('aac', 'mid', 'AAC', 'aac');
					$extension_audio_lisable = array('mp3', 'wav', 'ogg');
					$extension_video = array('avi','3gp', 'mov', 'mpg', 'qt', 'ra', 'ram', 'wmv', 'ts');
					$extension_video_lisable = array('mp4', 'webm', 'ogg', 'mkv');

					$extension_a_down = strtolower(substr(strrchr($name_file, '.'), 1));

					$name_modify = $name_file;
					$groupe_modify = $groupe_file;
					$user_name_modify = $name_prop;
					$groupe_file = str_replace(' ', '%20', $groupe_file);
					$destination = str_replace(' ', '%20', $destination);
					
					if(strlen($name_modify)>23)
					{
						$name_modify = substr($name_file, 0, 23);
						$name_modify = "$name_modify...";
					}

					if(strlen($groupe_modify)>18)
					{
						$groupe_modify = substr($groupe_modify, 0, 14);
						$groupe_modify = "$groupe_modify...";
					}

					if(strlen($user_name_modify)>14)
					{
						$user_name_modify = substr($user_name_modify, 0, 14);
						$user_name_modify = "$user_name_modify...";
					}
				?>

				<?php
				$ext_txt = array('txt');
				$ext_apk = array('apk');
				$ext_bat = array('bat', 'cmd');
				$ext_c = array('c');
				$ext_csharp = array('cs');
				$ext_cplus = array('cpp');
				$ext_css = array('css');
				$ext_debian = array('deb');
				$ext_excel = array('xls', 'xlsx', 'csv', 'ods', 'ots');
				$ext_exe = array('exe', 'msi');
				$ext_html = array('html');
				$ext_ios = array('ios');
				$ext_iso = array('iso');
				$ext_java = array('java', 'jar', 'jad');
				$ext_js = array('js');
				$ext_linux = array('rpm', 'bundle', 'run');
				$ext_mac  = array('macx', 'dmg');
				$ext_obc = array('obc');
				$ext_pascal = array('pas', 'lpi', 'lpr');
				$ext_perl = array('pl');
				$ext_php = array('php');
				$ext_ppt = array('ppt', 'pptx', 'odp', 'otp', 'odg', 'fodp');
				$ext_python = array('py', 'pyc', 'py2', 'py3');
				$ext_rar = array('rar');
				$ext_sh = array('sh');
				$ext_sql = array('sql', 'db');
				$ext_tar = array('tar', 'bz', 'bz2', 'gz');
				$ext_word = array('doc', 'docx', 'fodt', 'odt');
				$ext_zip = array('zip', '7zip', '7z');
				$ext_pdf = array('pdf');
				$ext_xml = array('xml');
				if(in_array($extension_a_down, $ext_txt)){
					$img = 'txt.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_perl)){
					$img = 'perl.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_xml)){
					$img = 'xml.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_zip)){
					$img = 'zip.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_sh)){
					$img = 'sh.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_tar)){
					$img = 'tar.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_word)){
					$img = 'word.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_sql)){
					$img = 'sql.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_ppt)){
					$img = 'power.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_rar)){
					$img = 'rar.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_python)){
					$img = 'py.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_php)){
					$img = 'php.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_mac)){
					$img = 'mac.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_obc)){
					$img = 'obc.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_pascal)){
					$img = 'pas.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				
				elseif(in_array($extension_a_down, $ext_apk)){
					$img = 'android.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_bat)){
					$img = 'BAT.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_c)){
					$img = 'c.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_csharp)){
					$img = 'csharp.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_cplus)){
					$img = 'c++.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_css)){
					$img = 'css.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_debian)){
					$img = 'debian.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_excel)){
					$img = 'excel.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_pdf)){
					$img = 'pdf.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_exe)){
					$img = 'exe.jpg';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_html)){
					$img = 'html.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_ios)){
					$img = 'IOS.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_iso)){
					$img = 'iso.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_java)){
					$img = 'java.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_js)){
					$img = 'js.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}

				elseif(in_array($extension_a_down, $ext_linux)){
					$img = 'linux.png';
					affichage_file($name_modify, $groupe_modify, $user_name_modify, 
					$date_upload_file, $destination, $user_name, $name_prop, $name_file, $groupe_file, $type, $img, $createur_groupe);
				}
		
					elseif(in_array($extension_a_down, $extension_fic)){
				?>  
					
						<div class="team layout-2">
							<div class="img-team">
								<div class="img-team">
									<img src="public/image/fic_new.png" alt="">
								</div>	
							</div>
							<br><br>
							<div class="padding-20px">
								<h3><?= $name_modify ?></h3>
								<h3>Propriétaire: <?= $user_name_modify ?></h3>
								<h3>Groupe: <?= $groupe_modify ?></h3>
								<h3>Date upload: <?= $date_upload_file ?></h3>
							</div>
							<ul class="social-list">
								<li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
								<?php
								if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
									?>
										<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
									<?php
								}
								elseif($user_name==$createur_groupe){
									?>
										<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
									<?php
								}
								?>
												
							</ul>
						</div>
					

				<?php
					}
					elseif(in_array($extension_a_down, $extension_image)){

						if($type == 'groupe'){
							$chemin_file = "public/stockage/groupe/$groupe_file/$name_file";
										
						}
						else{
							$chemin_file = "public/stockage/users/$groupe_file/$name_file";
						}
				?>

				
					<div class="team layout-2">
						<div class="img-team">
								<div class="img-team">
									<img src=<?= $chemin_file ?> alt="">
								</div>	
						</div>
						<div class="padding-20px">
							<h3><?= $name_modify ?><br></h3>
							<h3>Propriétaire: <?= $user_name_modify ?></h3>
							<h3>Groupe: <?= $groupe_modify ?></h3>
							<h3>Date upload: <?= $date_upload_file ?></h3>
						</div>
						<ul class="social-list">
						<li><a href=<?= "$destination" ?>><i class="fa fa-download" aria-hidden="true"></i></a></li>
						<?php
							if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							elseif($user_name==$createur_groupe){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
						?>

								
								
						</ul>
					</div>
				

				<?php
					}
					elseif(in_array($extension_a_down, $extension_audio)){
				?>

				
					<div class="team layout-2">
						<div class="img-team">
							<div class="img-team">
								<img src="public/image/audio_new.png" alt="">
							</div>	
						</div>
						<br><br>
						<div class="padding-20px">
						<h3><?= $name_modify ?><br></h3>
							<h3>Propriétaire: <?= $user_name_modify ?></h3>
							<h3>Groupe: <?= $groupe_modify ?></h3>
							<h3>Date upload: <?= $date_upload_file ?></h3>
						</div>
						<ul class="social-list">
							<li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
							<?php
							if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop ){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							elseif($user_name==$createur_groupe){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							?>
											
						</ul>
					</div>
				

				<?php
					}

					elseif(in_array($extension_a_down, $extension_audio_lisable)){

						if($type == 'groupe'){
							$chemin_file = "public/stockage/groupe/$groupe_file/$name_file";
					
						}
						else{
							$chemin_file = "public/stockage/users/$groupe_file/$name_file";
						}
				
				?>

				
					<div class="team layout-2">
						<ul class="social-list">
							<li><a href="#"><i class="fa fa-music" aria-hidden="true"></i></a></li>
						</ul>
						<div class="img-team">
							<audio controls> 
								<source src=<?= $chemin_file ?> type="audio/mp3">
							</audio>
						</div>
						<div class="padding-20px">
						<h3><?= $name_modify ?><br></h3>
							<h3>Propriétaire: <?= $user_name_modify ?></h3>
							<h3>Groupe: <?= $groupe_modify ?></h3>
							<h3>Date upload: <?= $date_upload_file ?></h3>
						</div>
						<ul class="social-list">
							<li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
							<?php
							if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							elseif($user_name==$createur_groupe){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							?>
											
						</ul>
					</div>
				



				<?php
					}

					elseif(in_array($extension_a_down, $extension_video)){
				?>

				
					<div class="team layout-2">
						<div class="img-team">
							<div class="img-team">
								<img src="public/image/video_new.png" alt="">
							</div>	
						</div>
						<br><br>
						<div class="padding-20px">
						<h3><?= $name_modify ?><br></h3>
							<h3>Propriétaire: <?= $user_name_modify ?></h3>
							<h3>Groupe: <?= $groupe_modify ?></h3>
							<h3>Date upload: <?= $date_upload_file ?></h3>
						</div>
						<ul class="social-list">
							<li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
							<?php
							if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							elseif($user_name==$createur_groupe){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							?>
											
						</ul>
					</div>
				

				<?php
					}


					elseif(in_array($extension_a_down, $extension_video_lisable)){

						if($type == 'groupe'){
							$chemin_file = "public/stockage/groupe/$groupe_file/$name_file";

					
					}
					else{
						$chemin_file = "public/stockage/users/$groupe_file/$name_file";
					}
				
				?>

				
					<div class="team layout-2">
						<div class="img-team">
							<div class="img-team">
								<video controls> 
									<source src=<?= $chemin_file ?> type="video/mp4">
								</video>
							</div>	
						</div>
						<div class="padding-20px">
						<h3><?= $name_modify ?><br></h3>
							<h3>Propriétaire: <?= $user_name_modify ?></h3>
							<h3>Groupe: <?= $groupe_modify ?></h3>
							<h3>Date upload: <?= $date_upload_file ?></h3>
						</div>
						<ul class="social-list">
							<li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
							<?php
							if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							elseif($user_name==$createur_groupe){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							?>
											
						</ul>
					</div>
				



				<?php
					}
					else{
				?>
					
				
					<div class="team layout-2">
						<div class="img-team">
							<div class="img-team">
								<img src="public/image/autre_new.png" alt="">
							</div>	
						</div>
						<br><br>
						<div class="padding-20px">
						<h3><?= $name_modify ?><br></h3>
							<h3>Propriétaire: <?= $user_name_modify ?></h3>
							<h3>Groupe: <?= $groupe_modify ?></h3>
							<h3>Date upload: <?= $date_upload_file ?></h3>
						</div>
						<ul class="social-list">
							<li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
							<?php
							if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							elseif($user_name==$createur_groupe){
								?>
									<li><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer <?= $name_file ?> ?'));" href="index.php?action=delete_file_my_groupe&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>&user_name=<?= $user_name ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
								<?php
							}
							?>
											
						</ul>
					</div>
				
					
				<?php
					}
				?>
			</div>
			<?php
			$i++; endforeach;

			?>
			</div>

		</div>

	</div>


	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-arrow-left"></i></a>
			<?php
				if(isset($affichage_files_groupe)){
					$_SESSION['groupe_actif'] = $affichage_files_groupe;
			?>
				<a href="#"><i class="icon text-main-color fa fa-users"></i><h5 style="display: inline"> <?= $affichage_files_groupe ?></h5></a>

			<?php
			}
				if($error_name_groupe == "Nom du groupe déjà utilisé"){
					echo $error_name_groupe;
				}
			
				if(isset($user_files)){
					?>
						<a href="#"><i class="icon text-main-color fa fa-user"></i><h5 style="display: inline"> Groupe personel</h5></a>
						<a href="#myModal_groupe" data-toggle="modal"><i class="icon text-main-color fa fa-plus"></i><h5 style="display: inline"> Créer un groupe</h5></a>
					<?php
						$_SESSION['groupe_actif'] = $user_files;
					
				}

			if(isset($affichage_files_groupe)){
					
				?>
					<a href="index.php?action=ajouter_membre"><i class="icon text-main-color fa fa-plus"></i><h5 style="display: inline"> Ajouter un membre</h5></a>
					<a href="#"><i class="icon text-main-color fa fa-users"></i><h5 style="display: inline"> Membres de groupe</h5></a>
				<?php
					for($i=0; $i<$nbr_membre; $i++){
						$name = $membre_groupe["$i"];
					?>
					<a href="#"> <h6 style="display: inline" > <?= $name ?> </h6> <i class="fa fa-comment-o"></i> </a>
					
					<?php
					}
				?>
					<a href="#myModal_groupe" data-toggle="modal"><i class="icon text-main-color fa fa-plus"></i><h5 style="display: inline"> Créer un groupe</h5></a>
					<a href="index.php?action=connecter&amp;user_name=<?= $user_name;?>&amp;id=<?= $id;?>"><i class="icon text-main-color fa fa-user"></i><h5 style="display: inline"> Groupe personel</h5> </a><br>
				<?php

			}
			?>
				<a href="#"><i class="icon text-main-color fa fa-users"></i><h5 style="display: inline"> Mes groupes</h5></a>
			<?php	

				while($my_groupe = $mes_groupes->fetch()){
					$my_groupe_name = $my_groupe["name_groupe"];
					$id_my_groupe = $my_groupe["id_groupe"];

					?>
						<a href="index.php?action=my_groupe&amp;groupe_name=<?= $my_groupe_name; ?>&amp;
						user_name=<?= $user_name;?>&amp;id=<?= $id;?>&amp;id_my_groupe=<?= $id_my_groupe;?>"><h6 style="display: inline"> <?= $my_groupe_name; ?></h6> </a>
					<?php
				}

			?>
				<a href="#"><i class="icon text-main-color fa fa-users"></i><h5 style="display: inline"> Autres groupes</h5></a>
			<?php
				while($groupe = $groupes_user->fetch()){
					$groupe_name = $groupe['groupe_name'];
					$id_groupe = $groupe['id_groupe'];
					?>
						<a href="index.php?action=my_groupe&amp;groupe_name=<?= $groupe_name; ?>&amp;
						user_name=<?= $user_name; ?>&amp;id=<?= $id;?>&amp;id_groupe=<?= $id_groupe; ?>"><h6 style="display: inline"> <?= $groupe_name; ?></h6> </a>
						
					<?php
				}
				if(isset($affichage_files_groupe)){			
			?>
				<a href="index.php?action=quitter_groupe&amp;user_name=<?= $user_name ?>&amp;id=<?= $id ?>&amp;groupe_name=<?= $affichage_files_groupe ?>"><i class="icon text-main-color fa fa-close"></i><h5 style="display: inline"> Quitter le groupe</h5></a>
			<?php
				}
			?>
	</div>



	
	<div id="mySidenav2" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav2()"><i class="fa fa-arrow-left"></i></a>
			<a href="#"><i class="icon text-main-color fa fa-users"></i><h5 style="display: inline"> Membres en ligne</h5></a>

			<?php
			if(isset($user_files)){
			

					while($user_connecter = $users_connecter->fetch()){
						$name_user_connecter = $user_connecter['user_name'];
						if($name_user_connecter != $user_name){
						?>
							<a href="#"><h6 style="display: inline"> <?= $name_user_connecter ?> </h6> <i class="fa fa-comment-o"></i> <i class="fa fa-circle"></i></a>
						<?php
						}
					}
				}

			?>

	</div>
		        
		      
		        
	<script>
		function openNav() {
			info1 = document.getElementById("mySidenav");
			info2 = document.getElementById("mySidenav2");

			if (info1.style.width == '') {
				info1.style.width = '250px';

				if (info2.style.width == '250px'){
					info2.style.width = '';
				}
			}

			else{
				info1.style.width = '';
			}

		}
		        
		function closeNav() {
			document.getElementById("mySidenav").style.width = '';
		}		
	</script>

	<script>
		function openNav2() {
		  	info1 = document.getElementById("mySidenav");
		  	info2 = document.getElementById("mySidenav2");
		  	if (info2.style.width == '') {
				info2.style.width = '250px';

				if (info1.style.width == '250px'){
					info1.style.width = '';
			  	}
		  	}
		  	else{
			  info2.style.width = '';
		  	}

		}
		
		function closeNav2() {
		  document.getElementById("mySidenav2").style.width = '';
		}
	</script>
	
	<script src="public/js/YouTubePopUp.jquery.js"></script>
	<script src="public/js/imagesloaded.min.js"></script>
	<script src="public/js/custom.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>

</body>


<!-- page-out-team01:31-->
</html>

<?php
		require("public/modal/add_file.php");
		require("public/modal/create_groupe.php");
		require("public/modal/delete_file.php");

        require("view/template.php");        
    }
}
?>
