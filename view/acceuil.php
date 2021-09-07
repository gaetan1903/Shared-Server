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

<nav class="navbar navbar-default navbar-expand-xl">
	<div class="navbar-header d-flex col">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" name="search" placeholder="Rechercher ici">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<ul class="nav navbar-nav navbar-right ml-auto">
			<li class="nav-item"><a href="#" class="nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">10</span></a></li>
			<li class="nav-item"><a href="#" class="nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">-5</span></a></li>
			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="public/image/off.jpg" class="avatar" alt="Avatar"> <b class="off"> <?= $user_name; ?> </b><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></li>
					<li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Langues</a></li>
					<li class="divider dropdown-divider"></li>
					<li><a href="index.php?action=se_deconnecter&amp;user_name=<?= $user_name ?>" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Déconnexion</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
			<div class="media-left">
            
                <a href="#myModal_groupe" data-toggle="modal"><img class="media-object" src="public/image/créer_groupe.png"></a><br>
				<?php
					if($error_name_groupe == "Nom du groupe déjà utilisé"){
						echo $error_name_groupe;
					}
				?>
            
			</div>
			
			<?php
				if(isset($user_files)){
					echo "$user_files <br><br>";
					$_SESSION['groupe_actif'] = $user_files;
					
				}

				if(isset($affichage_files_groupe)){
					echo "$affichage_files_groupe <br>";
					$_SESSION['groupe_actif'] = $affichage_files_groupe;

				?>
				<a href="index.php?action=ajouter_membre"><img class="media-object" src="public/image/ajouter_membre.png"></a>
				<?php
								
					echo "<br>Membres de groupe :<br>";
					for($i=0; $i<$nbr_membre; $i++){
						$name = $membre_groupe["$i"];
						echo "$name <br>";
					}
				?>
				<br>
				<a href="index.php?action=connecter&amp;user_name=<?= $user_name;?>&amp;id=<?= $id;?>"><?= $user_name; ?> </a><br>

				<?php
				
				}

				while($my_groupe = $mes_groupes->fetch()){
					$my_groupe_name = $my_groupe["name_groupe"];
					$id_my_groupe = $my_groupe["id_groupe"];
			?>
					<a href="index.php?action=my_groupe&amp;groupe_name=<?= $my_groupe_name; ?>&amp;
					user_name=<?= $user_name;?>&amp;id=<?= $id;?>&amp;id_my_groupe=<?= $id_my_groupe;?>"> <?= $my_groupe_name; ?> </a><br>
			<?php
				}
			
				echo "<br>Autre groupe :<br>";
				while($groupe = $groupes_user->fetch()){
					$groupe_name = $groupe['groupe_name'];
					$id_groupe = $groupe['id_groupe'];
			?>
					<a href="index.php?action=my_groupe&amp;groupe_name=<?= $groupe_name; ?>&amp;
					user_name=<?= $user_name; ?>&amp;id=<?= $id;?>&amp;id_groupe=<?= $id_groupe; ?>"> <?= $groupe_name; ?> </a><br>

					
			<?php
				}
				if(isset($user_files)){			
			?>
			<br>
			Utilisateur en ligne :<br>
			<?php
			

					while($user_connecter = $users_connecter->fetch()){
						$name_user_connecter = $user_connecter['user_name'];
						if($name_user_connecter != $user_name){
							echo "$name_user_connecter <br>";
						}
					}
				}

			?>
		</div>


		<div class="col-md-10">
			<div class="row">
				<div class="col-md-4">
					<div class="media">
						<div class="media-left">
							<a href="#">
							<a href="#myModal_fichier" data-toggle="modal"><img class="media-object" src="public/image/ajouter_ajouter.png"></a>
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"></h4>
						</div>
					</div>
				</div>
				<?php 
					$i = 0; foreach ($files as $file): 
				?>
				<div class="col-md-4">
                    <div class="media">
                        <div class="media-left">

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

								

								require('view/file_list.php');
							
							?>

							</div>
								<div class="media-body">
									<h4 class="media-heading"><br/></h4>
								
								</div>
							</div>
                		</div>
						<?php $i++; endforeach;?>
            		</div>
        	</div>
    	</div>
	</div>
</div>

<?php
		require("public/modal/add_file.php");
		require("public/modal/create_groupe.php");
		require("public/modal/delete_file.php");
        $content = ob_get_clean();
        require("view/template.php");        
    }
}
?>