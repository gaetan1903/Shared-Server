<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=bdd_sserver','sserver','sserver') or die("not connect");
if (isset($_GET['id']) AND ($_GET['id']) > 0) 
{
	
	$getid = intval($_GET['id']);
	$req = $bdd ->prepare("SELECT * FROM membre WHERE id = ? ");
	$req ->execute(array($getid));
	$userinfo = $req -> fetch();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shared-Server</title>
<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	  body{
	      	       background-image:url("Images/po4.jpg");
	      	       opacity:1;
	      	       background-size:cover;
	      	       height:5%;
	      	       background-repeat:no-repeat;
	      	       background-attachment:fixed;
	      	       background-color:white;
	      	       }
    .form-inline {
        display: inline-block;
    }
	.navbar-header.col {
		padding: 0 !important;
	}	
	.navbar {		
		background: #032f62;
		border:none !important;
		border-radius:0px;
		padding-left: 16px;
		padding-right: 16px;
		box-shadow: 0 0 4px rgba(0,0,0,.1);
	}
	.nav-link img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}
	.search-box {
        position: relative;
    }	
    .search-box input {
	box-shadow: none;
        padding-right: 35px;
        border-radius: 3px !important;
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
	height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
	font-size: 19px;
    }
	.navbar .nav-item i {
		font-size: 18px;
	}
	.navbar .dropdown-item i {
		font-size: 16px;
		min-width: 22px;
	}
	.navbar .nav-item.open > a {
		background: none !important;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: white;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .dropdown-menu li a {
		color: #999;
		padding: 8px 20px;
		line-height: normal;
	}
	.navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:active {
		color: #333;
	}	
	.navbar .dropdown-item .material-icons {
		font-size: 21px;
		line-height: 16px;
		vertical-align: middle;
		margin-top: -2px;
	}
	.navbar .badge {
		background: #f44336;
		font-size: 11px;
		border-radius: 20px;
		position: absolute;
		min-width: 10px;
		padding: 4px 6px 0;
		min-height: 18px;
		top: 5px;
	}
	.navbar ul.nav li a.notifications, .navbar ul.nav li a.messages {
		position: relative;
		margin-right: 10px;
	}
	.navbar ul.nav li a.messages {
		margin-right: 20px;
	}
	.navbar a.notifications .badge {
		margin-left: -8px;
	}
	.navbar a.messages .badge {
		margin-left: -4px;
	}	
	.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
		background: transparent !important;
	}
	@media (min-width: 1200px){
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}
	@media (max-width: 1199px){
		.form-inline {
			display: block;
			margin-bottom: 10px;
		}
		.input-group {
			width: 100%;
		}
	}
	
	.off{
	     color:white;}
	.caret{
		color:white;}
	
	.fa-bell-o{
		color:white;}
	.fa-envelope-o{
		color:white;}
	#desc_fichier{
		color:white;
	
	}
	#test {
		position: absolute;
		left:20%;
	}
	.form-control {
        						box-shadow: none;
        						border-color: #ddd;
    						}
    		     .form-control:focus {
							border-color: #FB6E9D;
        						box-shadow: 0 0 8px rgba(251,110,157,0.4);
							}
	#aa {
		position:absolute;
		left:20%;
	}
	.fichier {
		color: black;
	}
    #desc_fic {
        color: white;
    }

</style>
</head> 
<body>
<?php
if ($userinfo['id'] == $_SESSION['id']) 
{ 
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
				<input type="text" id="search" class="form-control" placeholder="Rechercher ici">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<ul class="nav navbar-nav navbar-right ml-auto">
			<li class="nav-item"><a href="#" class="nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">10</span></a></li>
			<li class="nav-item"><a href="#" class="nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">-5</span></a></li>
			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="Images/off.jpg" class="avatar" alt="Avatar"> <b class="off"> <?php echo $userinfo['user_name']; ?> </b><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></li>
					<li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Langues</a></li>
					<li class="divider dropdown-divider"></li>
					<li><a href="se_deconnecter.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Déconnexion</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<?php 

$extension_fic = array('bat', 'doc', 'docx', 'exe', 'gz', 'odt', 'pps', 'ppt', 'rar', 'tar', 'xls', 'xlsx', 'zip', 
'XML', 'sh', 'h', 'py', 'odp', 'ods', 'odg', 'pdf', 'txt', 'php', 'html');
$extension_image = array('bmp', 'gif', 'iso', 'jpeg', 'jpg', 'png', 'eps', 'psd', 'psp', 'tif', 'tiff');
$extension_audio = array('aac', 'mp3', 'wav', 'mid', 'AAC', 'aac');
$extension_video = array('avi', 'mkv', 'mov', 'mpg', 'qt', 'ra', 'ram', 'mp4', 'wmv', );

$fichiers = $bdd->query("SELECT user_name, file_name, groupe_name, date_upload, description_file from file WHERE user_name=$user_name_connecter");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam eos, quod pariatur voluptas maiores vero earum perspiciatis ex dignissimos? Aliquam deserunt omnis suscipit numquam blanditiis ipsum dicta dolorem eligendi maiores!</p>
        </div>
        <div class="col-md-10">
            <div class="row">
            <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <a href="#myModal" data-toggle="modal"><img class="media-object" src="ajouter_ajouter.png"></a>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"></h4>
                            ...
                        </div>
                    </div>
                </div>

            <?php $i = 0; foreach ($fichiers as $fichier): ?>
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-left">
						<?php 
						$user_name_connecter=$userinfo['user_name'];
                        $name_file = $fichier['file_name'];
                        $user_file = $fichier['user_name'];
                        $groupe_file = $fichier['groupe_name'];
                        $date_upload_file = $fichier['date_upload'];
                        $description_file = $fichier['description_file'];
                        $destination = "Dossier/$user_name_connecter/";
                        $extension_a_down = strtolower(substr(strrchr($name_file, '.'), 1));
                    
                        ?>
                          
                            <?php 
                            if(in_array($extension_a_down, $extension_fic)){
                                echo '<div id="desc_fic"><img class="media-object" src="fic_new.png">'.$name_file.'<br/>
                                Propriétaire: '.$user_file.'<br/>Groupe: '.$groupe_file.'<br/>Upload: '.$date_upload_file.'
                                <br/></div>';
                                echo "<a href=\"$destination\">Download</a>";
                            }
                            elseif(in_array($extension_a_down, $extension_image)){
                                echo '<div id="desc_fic"><img class="media-object" src="image_new.png">'.$name_file.'<br/>
                                Propriétaire: '.$user_file.'<br/>Groupe: '.$groupe_file.'<br/>Upload: '.$date_upload_file.'
                                <br/></div>';
                                echo "<a href=\"$destination\">Download</a>";
                            }
                            elseif(in_array($extension_a_down, $extension_audio)){
                                echo '<div id="desc_fic"><img class="media-object" src="audio_new.png">'.$name_file.'<br/>
                                Propriétaire: '.$user_file.'<br/>Groupe: '.$groupe_file.'<br/>Upload: '.$date_upload_file.'
                                <br/></div>';
                                echo "<a href=\"$destination\">Download</a>";
                            }
                            elseif(in_array($extension_a_down, $extension_video)){
                                echo '<div id="desc_fic"><img class="media-object" src="video_new.png">'.$name_file.'<br/>
                                Propriétaire: '.$user_file.'<br/>Groupe: '.$groupe_file.'<br/>Upload: '.$date_upload_file.'
                                <br/></div>';
                                echo "<a href=\"$destination\">Download</a>";
                            }
                            else{
                                echo '<div id="desc_fic"><img class="media-object" src="autre_new.png">'.$name_file.'<br/>
                                Propriétaire: '.$user_file.'<br/>Groupe: '.$groupe_file.'<br/>Upload: '.$date_upload_file.'
                                <br/></div>';
                                echo "<a href=\"$destination\">Download</a>";
                            }
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


	     	<!-- Modal HTML -->
			 <div id="myModal" class="modal fade">
	

	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
							<div class="avatar"><i class="material-icons">&#xE7FD;</i></div>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="insertion.php" method="post" enctype="multipart/form-data">
					
					<span class="fichier">Fichier :</span>
						<input type="file"  name="fichier" /><br /><br />
					
					<div class="form-group">
					<span class="fichier">Description fichier :</span>
						<textarea name="description_file" rows="7" cols="45" class="form-control" placeholder="Description du fichier" name="description_file" ></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" name="valid" value="Envoyer le fichier"/>
					</div>
					<?php
					if(isset($erreur))
					{
						echo '<font color="red">'.$erreur."</font>";
					}
					?>
				</form>				
				<div class="hint-text small"><a href="#">Forgot Your Password?</a></div>
			</div>
		</div>
	</div>
</div>
<?php
    }
?>
</body>
</html>   
<?php
}
?>