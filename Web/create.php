<?php
$bdd = new PDO('mysql:host=localhost;dbname=bdd_sserver','sserver','sserver') or die("not connect");




if(isset($_POST['s_inscrire']))
{

  $user_name = htmlspecialchars($_POST['user_name']);
  $mail = htmlspecialchars($_POST['mail']);
  $mdp = sha1($_POST['mdp']);
  $mdp2 = sha1($_POST['mdp1']);
  $mdp1 = htmlspecialchars($_POST['mdp1']);
    if(!empty($_POST['user_name']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp1']) )
    {

      $req = $bdd->prepare("SELECT * FROM membre WHERE user_name = ? ");
      $req -> execute(array($user_name));
      $exista = $req -> rowCount(); 
      if($exista == 0)
      {


        $reta = $bdd->prepare("SELECT * FROM membre WHERE mail = ? ");
        $reta -> execute(array($mail));
        $exis = $reta -> rowCount(); 
        if($exis == 0)
        {

          $nb_d_mdp = strlen($mdp1);
          if ($nb_d_mdp > 2) 
          {

            if($mdp == $mdp2)
            {
            	$init = 0 ;
            	$logkey = 6;
            	$key = "";
            	for ($i=1; $i<$logkey ; $i++) 
            	{ 
            		$key .= mt_rand(0,9);
            	}
              $insertmbr = $bdd -> prepare(" INSERT INTO membre(user_name,mail,mdp,confirm_mail,ver) VALUES ('$user_name', '$mail', '$mdp','$key','$init') ");
              $insertmbr -> execute(array($user_name, $mail, $mdp,$key,$init));

							$connectio_ssh2 = ssh2_connect('localhost', 22);
							ssh2_auth_password($connectio_ssh2, 'mm', 'azert');
							ssh2_exec($connectio_ssh2, "mkdir /var/www/html/Web/Dossier/$user_name && chmod 777 /var/www/html/Web/Dossier/$user_name");


              $header = 'MIME-Version 1.0\r\n';
              $header = 'FROM:shared-server.est.mg<jean.offman.bienvenu@esti.mg>'."\n";
              $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
              $header .='Content-Transfr-Encoding: 8bit';
              $message = '<!DOCTYPE html>
              <html>
              <body>
              	<div align="center">
              		<a href="localhost/projet/confirm.php?pseudo='.urlencode($user_name).'&key='.$key.'">Confrmez votre compte</a>
              	</div>
              </body>
              </html>';

              mail($mail,"Confirmation de compte",$message, $header);

              header("location: shared-server.php");

              
            }
            else
            {
              $erreur = "Votre mot de passe incorrect";
            }
          }
          else
          {
            $erreur = 'Votre mot de passe doit contenir au moins 8 caractères!';
          }
        }
        else
        {
          $erreur = "Votre mail est déjà utilisé par un autre compte";
        }
      }
      else
      {
        $erreur = "Votre nom d'utilisateur est déjà utilisé !";
      }
    }

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="Images/favicon-96x96.png" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Créer un compte</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	      <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
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
	
	
	
	.form-control, .form-control:focus, .input-group-addon {
		border-color: #e1e1e1;
	}
    .form-control, .btn {        
        border-radius: 3px;
    }
	.signup-form {
		width:395px;
		margin: 0 auto;
		padding: 30px 0;
		position:relative; margin-top:3%;
	}
    .signup-form form {
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group {
		margin-bottom: 20px;
	}
	.signup-form label {
		font-weight: normal;
		font-size: 13px;
	}
	.signup-form .form-control {
		min-height: 38px;
		box-shadow: none !important;
	}	
	.signup-form .input-group-addon {
		max-width: 42px;
		text-align: center;
	}
	.signup-form input[type="checkbox"] {
		margin-top: 2px;
	}   
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #19aa8d;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus {
		background: #179b81;
        outline: none;
	}
	.signup-form a {
		color: #fff;	
		text-decoration: underline;
	}
	.signup-form a:hover {
		text-decoration: none;
	}
	.signup-form form a {
		color: #19aa8d;
		text-decoration: none;
	}	
	.signup-form form a:hover {
		text-decoration: underline;
	}
	.signup-form .fa {
		font-size: 21px;
	}
	.signup-form .fa-paper-plane {
		font-size: 18px;
	}
	.signup-form .fa-check {
		color: #fff;
		left: 17px;
		top: 18px;
		font-size: 7px;
		position: absolute;
	}
	
	.text-center{
	                    color:teal;
	                    }
	                    
	                    
	   							}
		    .modal-login {
       					 color: #434343;
					 width: 350px;
					}
		    .modal-login .modal-content {
									padding: 20px;
									border-radius: 1px;
									border: none;
       								        position: relative;
								    }
		  .modal-login .modal-header {
									border-bottom: none;
								  }
		  .modal-login h4 {
						text-align: center;
						font-size: 22px;
       					        margin-bottom: -10px;
					     }
   		  .modal-login .avatar {
       						 	color: #fff;
							margin: 0 auto;
        						text-align: center;
							width: 100px;
							height: 100px;
							border-radius: 50%;
							z-index: 9;
							background: #2ebc4f;
							padding: 15px;
							box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
							}
	          .modal-login .avatar i {
						font-size: 62px;
	    					}
		  .modal-login .form-control, .modal-login .btn {
						min-height: 40px;
						border-radius: 1px; 
						transition: all 0.5s;
												}    
		   .modal-login .hint-text {
							text-align: center;
							padding-top: 10px;
		                                          }
		    .modal-login .close {
							position: absolute;
							top: 15px;
							right: 15px;
							}
		     .modal-login .btn {
							background: #2ebc4f;
							border: none;
							line-height: normal;
						   }
		      .modal-login .btn:hover, .modal-login .btn:focus {
													background: #2ebc4f;
													}
		      .modal-login .hint-text a {
									color: #999;
								}
		      .trigger-btn {
						display: inline-block;
						margin: 100px auto;
						}
</style>
</head>
<body>


<div class="signup-form">
    <form action="" method="post">
		<h2>S'inscrire</h2>
		<p>Entrez les informations necéssaires s'il vous plait</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="user_name" placeholder="Username" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="email" class="form-control" name="mail" placeholder="Email Address" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="mdp" placeholder="Password" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
				<input type="password" class="form-control" name="mdp1" placeholder="Confirm Password" required="required">
			</div>
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> J'accepte<a href="#">les conditions d'utilisation</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="s_inscrire">S'inscrire</button>
        </div>

		<?php
      	if(isset($erreur))
      	{
        	echo '<font color="red">'.$erreur."</font>";
      	}
		?>
    </form>
	<div class="text-center">Avez-vous déjà un compte? <a  href="http://localhost/projet/Shared-Server-1/Web/shared-server.php" data-toggle="modal" >Se connecter ici</a></div>
</div>
</body>
</html>
