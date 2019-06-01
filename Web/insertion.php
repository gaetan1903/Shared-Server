<?php
session_start();
include("funct.php");
if (isset($_SESSION["id"])) 
{
	$getid = intval($_SESSION['id']);
	$req = $bdd ->prepare("SELECT * FROM membre WHERE id = ? ");
	$req ->execute(array($getid));
	$userinfo = $req -> fetch();


$message = ""; 
$user_name = $userinfo['user_name'];
$groupe_name = 'dfdfd fd df df dfd fd fddf'; 

if (isset($_POST["valid"]))
{ 
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

	//Description fichier
	$description_file = $_POST["description_file"];

	switch ($code_erreur)
	{ 
		case UPLOAD_ERR_OK : 
			// Fichier bien reçu. 
			// Détermine sa destination finale. 
			$destination = "../../Web/Dossier/$user_name/$file_name"; 

			// Copie le fichier temporaire 
			if (copy($fichier_temporaire,$destination))
			{ 
				// Copie OK
				$message  = "Transfert termine - Fichier = $nom - "; 
				$message .= "Taille = $taille octets - "; 
				$message .= "Type MIME = $type_mime."; 

				$insert_file = $bdd->prepare('INSERT INTO file(user_name, file_name, groupe_name, description_file) VALUES(?,?,?,?)');
				$insert_file -> execute(array($user_name, $file_name, $groupe_name, $description_file));
				$insert_file -> closeCursor();


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
header("Location: test.php?id=".$_SESSION['id']);
}
?>	