<?php 
include("funct.php");
$extension_fic = array('bat', 'doc', 'docx', 'exe', 'gz', 'odt', 'pps', 'ppt', 'rar', 'tar', 'xls', 'xlsx', 'zip', 
'XML', 'sh', 'h', 'py', 'odp', 'ods', 'odg', 'pdf', 'txt', 'php', 'html');
$extension_image = array('bmp', 'gif', 'iso', 'jpeg', 'jpg', 'jpe', 'png', 'eps', 'psd', 'psp', 'tif', 'tiff');
$extension_audio = array('aac', 'mp3', 'wav', 'mid', 'AAC', 'aac');
$extension_video = array('avi', 'mkv', 'mov', 'mpg', 'qt', 'ra', 'ram', 'mp4', 'wmv', );

	$file = $bdd -> query('SELECT user_name, file_name, groupe_name, date_upload, description_file from file');
	while ($recupere_name = $file->fetch())
	{
		$name_file = $recupere_name['file_name'];
		$user_file = $recupere_name['user_name'];
		$groupe_file = $recupere_name['groupe_name'];
		$date_upload_file = $recupere_name['date_upload'];
		$description_file = $recupere_name['description_file'];
		$destination = "tutoriels/$name_file";
		$extension_a_down = strtolower(substr(strrchr($name_file, '.'), 1));
	
		

		if(in_array($extension_a_down, $extension_fic))
		{
			echo '<img src="fic.jpg" />';
			echo "<br>Nom du fichier : $name_file <br> Propriétaire du fichier : $user_file <br>
			Groupe : $groupe_file <br> Date upload : $date_upload_file <br> Description : $description_file <br>";
			echo "<tr><td><a href=\"$destination\">Download</a></td></tr>";
			echo '<br><br>';
		}
		elseif(in_array($extension_a_down, $extension_image))
		{
			echo '<img src="image.jpeg" />';
			echo "<br>Nom du fichier : $name_file <br> Propriétaire du fichier : $user_file <br>
			Groupe : $groupe_file <br> Date upload : $date_upload_file <br> Description : $description_file <br>";
			echo "<tr><td><a href=\"$destination\">Download</a></td></tr>";
			echo '<br><br>';
		}
		elseif(in_array($extension_a_down, $extension_audio))
		{
			echo '<img src="audio.jpeg" />';
			echo "<br>Nom du fichier : $name_file <br> Propriétaire du fichier : $user_file <br>
			Groupe : $groupe_file <br> Date upload : $date_upload_file <br> Description : $description_file <br>";
			echo "<tr><td><a href=\"$destination\">Download</a></td></tr>";
			echo '<br><br>';
		}
		elseif(in_array($extension_a_down, $extension_video))
		{
			echo '<img src="videos.jpeg" />';
			echo "<br>Nom du fichier : $name_file <br> Propriétaire du fichier : $user_file <br>
			Groupe : $groupe_file <br> Date upload : $date_upload_file <br> Description : $description_file <br>";
			echo "<tr><td><a href=\"$destination\">Download</a></td></tr>";
			echo '<br><br>';
		}
		else
		{	
			echo '<img src="autre.png" />';		
			echo "<br>Nom du fichier : $name_file <br> Propriétaire du fichier : $user_file <br>
			Groupe : $groupe_file <br> Date upload : $date_upload_file <br> Description : $description_file <br>";
			echo "<tr><td><a href=\"$destination\">Download</a></td></tr>";
			echo '<br><br>';
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
		<form action="Succee.php" method="post" enctype="multipart/form-data"> 
			<div> 
				Fichier :  
				<input size="100000000" type="file" name="fichier" /> <br />
				Description du fichier : <br />
				<textarea name="description_file" rows="7" cols="45"></textarea> <br />
				<input type="submit" name="valid" value="Envoyer le fichier" /><br /> 
				<?php echo $message; ?> 
			</div> 
		</form> 
	</body> 
</html>