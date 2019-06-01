<?php 
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres', 'root', '') or die('no');
$message = ""; 
$user_name = 'test';
$groupe_name = 'G1'; 
$date = 'hgf';
if (isset($_POST["valid"]))
{
	//nom du fichier. 

	// Récupére les informations sur le fichier. 
	$oFileInfos = $_FILES["fichier"]; 
 
	// nom du fichier. 
	$file_name= $oFileInfos["name"]; 

	// le type MIME.  
	$type_mime = $oFileInfos["type"]; 

	// la taille. 
	$taille = $oFileInfos["size"]; 

	// emplacement du fichier temporaire. 
	$fichier_temporaire = $oFileInfos["tmp_name"]; 

	// le code d’erreur. 
	$code_erreur = $oFileInfos["error"]; 

	switch ($code_erreur)
	{ 
		case UPLOAD_ERR_OK : 
			// Fichier bien reçu. 
			// Détermine sa destination finale. 
			$destination = "tutoriels/$file_name"; 

			// Copie le fichier temporaire 
			if (copy($fichier_temporaire,$destination))
			{ 
				// Copie OK
				$message  = "Transfert termine - Fichier = $file_name - "; 
				$message .= "Taille = $taille octets - "; 
				$message .= "Type MIME = $type_mime."; 

				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=espace_membres', 'root', '') or die('no');
				}
				catch (Exception $e)
				{
				die('Erreur : ' . $e->getMessage());
				}
    			$insertmbr = $bdd -> prepare(" INSERT INTO file (user_name,file_name,groupe_name,date_upload) VALUES (?,?,?,?)");
    			$insertmbr -> execute(array($user_name,$file_name,$groupe_name,$date));
    			$insertmbr -> closeCursor();
				//$connectio_ssh2 = ssh2_connect('localhost', 22);
				//ssh2_auth_password($connectio_ssh2, 'mm', 'azert');
				//ssh2_exec($connectio_ssh2, 'upload_file '.$file_name.' '.$user_name.' '.$groupe_name);

				

			}
			else
			{ 
				// Problème de copie => message d’erreur. 
				$message = "Probleme de copie sur le serveur."; 
			} 
			break; 

		case UPLOAD_ERR_NO_FILE : 
			// Pas de fichier saisi. 
			$message = "Pas de fichier saisi."; 
			break; 

		case UPLOAD_ERR_INI_SIZE : 
			// Taille fichier > upload_max_filesize. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= " (taille > upload_max_filesize)"; 
			break; 

		case UPLOAD_ERR_FORM_SIZE : 
			// Taille fichier > MAX_FILE_SIZE. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(taille > MAX_FILE_SIZE)"; 
			break; 

		case UPLOAD_ERR_PARTIAL : 
			// Fichier partiellement transféré. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(problème lors du tranfert)"; 
			break; 

		case UPLOAD_ERR_NO_TMP_DIR : 
			// Pas de répertoire temporaire. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(pas de répertoire temporaire)"; 
			break; 

		case UPLOAD_ERR_CANT_WRITE : 
			// Erreur lors de l’écriture du fichier sur disque. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(erreur lors de l'écriture du fichier sur le serveur)"; 
			break; 

		case UPLOAD_ERR_EXTENSION : 
			// Transfert stoppé par l’extension. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(transfert stoppé par l'extension)"; 
			break; 

		default : 
			// Erreur non prévue ! 
			$message  = "Fichier non transfere "; 
			$message .= "(erreur inconnue : ".$code_erreur.")"; 
	}

}
$extension_fic = array('bat', 'doc', 'docx', 'exe', 'gz', 'odt', 'pps', 'ppt', 'rar', 'tar', 'xls', 'xlsx', 'zip', 
'XML', 'sh', 'h', 'py', 'odp', 'ods', 'odg', 'pdf', 'txt', 'php', 'html');
$extension_image = array('bmp', 'gif', 'iso', 'jpeg', 'jpg', 'jpe', 'png', 'eps', 'psd', 'psp', 'tif', 'tiff');
$extension_audio = array('aac', 'mp3', 'wav', 'mid', 'AAC', 'aac');
$extension_video = array('avi', 'mkv', 'mov', 'mpg', 'qt', 'ra', 'ram', 'mp4', 'wmv', );

	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=espace_membres', 'root', '');
	}
	catch (Exception $e)
	{
	die('Erreur : ' . $e->getMessage());
	}
	$lire_file_name = $bdd -> query('SELECT file_name from file');
	while ($recupere_name = $lire_file_name->fetch())
	{
		$fic = $recupere_name['file_name'];
		$destination = "tutoriels/$fic";
		$extension_a_down = strtolower(substr(strrchr($fic, '.'), 1));
		

		if(in_array($extension_a_down, $extension_fic))
		{
			echo '<img src="fic.jpg" />';
			echo '<br>';
			echo "<tr><td><a href=\"$destination\">".$recupere_name['file_name']."</a></td></tr>";
			echo '<br>';
		}
		elseif(in_array($extension_a_down, $extension_image))
		{
			echo '<img src="image.jpeg" />';
			echo '<br>';
			echo "<tr><td><a href=\"$destination\">".$recupere_name['file_name']."</a></td></tr>";
			echo '<br>';
		}
		elseif(in_array($extension_a_down, $extension_audio))
		{
			echo '<img src="audio.jpeg" />';
			echo '<br>';
			echo "<tr><td><a href=\"$destination\">".$recupere_name['file_name']."</a></td></tr>";
			echo '<br>';
		}
		elseif(in_array($extension_a_down, $extension_video))
		{
			echo '<img src="videos.jpeg" />';
			echo '<br />';
			echo "<tr><td><a href=\"$destination\">".$recupere_name['file_name']."</a></td></tr>";
			echo '<br>';
		}
		else
		{	
			echo '<img src="autre.png" />';		
			echo 'autre';
			echo "<tr><td><a href=\"$destination\">".$recupere_name['file_name']."</a></td></tr>";
			echo '<br>';
		}
	}

?>
<!DOCTYPE html> 
<html> 
<head>
	<title>Upload</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head> 
	<body> 
		<form action="" method="post" enctype="multipart/form-data"> 
			<div> 
				Fichier :  
				<input size="100000000" type="file" name="fichier" /> 
				<input type="submit" name="valid" value="Envoyer le fichier" /><br /> 
				<?php echo $message; ?> 
			</div> 
		</form> 
	</body> 
</html>