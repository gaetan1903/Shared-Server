<?php
session_start();

$bdd = new PDO('mysql:host=192.168.150.119;dbname=sshared','root','__sshared__!!') or die("not connect");
if(isset($_POST['se_connecter']))
{
    $connectmail = htmlspecialchars($_POST['connectmail']);
    $connectmdp = sha1($_POST['connectmdp']);
    if(!empty($_POST['connectmail']) AND !empty($_POST['connectmdp']))
    {
		$req = $bdd->prepare("SELECT * FROM membre WHERE (user_name = ? OR email = ?) AND mdp = ? AND ver = 0 ");
		$req -> execute(array($connectmail,$connectmail,$connectmdp));
		$exista = $req -> rowCount(); 
		if($exista == 1)
		{
            $userinfo = $req ->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['user_name'] = $userinfo['user_name'];
			$_SESSION['email'] = $userinfo['email'];
			$_SESSION['ver'] = $userinfo['ver'];
			header("Location: profil.php?id=".$_SESSION['id']);

        }
        else
        {
            header("Location: shared-server.php");
        }
    }
    else
    {
        header("Location: shared-server.php");
    }
    
}
else
{
    header("Location: shared-server.php");
}
?>