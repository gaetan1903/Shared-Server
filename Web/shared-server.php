<?php
	session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=bdd_sserver','sserver','sserver') or die("not connect");
	
?>
<!DOCTYPE html>
<html>
	<head>
	      <meta charset="utf-8" />
	      <link rel="icon" type="image/png" href="Images/favicon-96x96.png" />
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	      <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	      <title>Shared-server</title>
	</head>
	<style>
	      
	      body{
	      	       background-image:url("Images/po4.jpg");
	      	       opacity:1;
	      	       background-size:cover;
	      	       height:5%;
	      	       background-repeat:no-repeat;
	      	       background-attachment:fixed;
	      	       background-color:white;
	      	       }
	      	       
	     
                   
           
             			
             /* Add a black background color to the top navigation */
		.topnav {
  				overflow: hidden;
  				position:fixed; left:0%; top:0%;
  				opacity:1;
  				z-index:1000;
  				width:100%;
			}

/* Style the links inside the navigation bar */
		.topnav a {
 				float: left;
  				color: white;
  				text-align: center;
  				padding: 18px 25px;
  				text-decoration: none;
  				font-size: 17px;
  				transition-duration:0.3s;
  				font-family:sans-serif;
			}

/* Change the color of links on hover */
		.topnav a:hover {
  			color: white;
  			background-color:#2ebc4f;
  			transition-duration:0.3s;
					}

/* Add a color to the active/current link */
		.topnav a.active {
  			background-color:#2ebc4f;
 			color: white;
 			transition-duration:0.3s;
 			font-family:sans-serif;
					}
		
						
		.conteneur1{
				   display:block;
				   width:55%;
				   position:relative; margin-left:22%; margin-top:165px;
				   }
				   
		 h1{
		    	color:#2ebc4f;
		    	font-family:sans-serif;
		   	position:relative; margin-left:25%;  }
	         p{
	       		font-size:17px;
	       		color:white;
	       		font-family:sans-serif;
	       		position:relative;margin-top:4%; }
	         .lienvoip{
	       		      color:white;
	       		      }
	         .lienvoip:hover{
	         			   color:#2ebcaf;
	         			   }
	         
	         .boutons{
	         		 position:relative; margin-left:33%; margin-top:4%;
	         		 }
	         .btn-outline-info{
	       		transition-duration:1s; padding:14px;display:inline; border-radius:100px;background-color:#2ebc4f;color:white; border-color:#2ebc4f;
	       		    }
	        .btn-outline-info:hover{
	       		transition-duration:1s; padding:14px;display:inline; border-radius:100px;background-color:#2ebc4f;color:white; border-color:#2ebc4f;
	       		    }
	          
	       .btn-outline-danger{
	       		transition-duration:1s; padding:14px;display:inline; color:#2ebc4f; border-color:#2ebc4f; position:relative; margin-left:2%; border-radius:100px;
	       		    }
	        .btn-outline-danger:hover{
	       		transition-duration:1s; padding:14px;display:inline; border-radius:100px;background-color:#2ebc4f;color:white; border-color:#2ebc4f;
	       		    }
	       		    
	          .pn{
	             position:fixed; margin-left:8%; margin-top:5%;
	             }
	        .carousel-control-next-icon{
	                                                       position:fixed; margin-top:-2.5%;margin-left:90%;
	                                                       }
	                                                       
	                                                       
	            
	            
	            .form-control {
        						box-shadow: none;
        						border-color: #ddd;
    						}
    		     .form-control:focus {
							border-color: #FB6E9D;
        						box-shadow: 0 0 8px rgba(251,110,157,0.4);
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
	<body>
		
		
                
                <div class="topnav" class="col-sm-6 col-md-4 col-lg-2" >
  			<a class="active" href="index.html">Accueil</a>
  			<a href="fonction.html">Fonctionnalités</a>
  			<a href="gallery.html">Gallerie</a>
  			<a href="membre.html">Membres</a>
  			<a href="contact.html"> Nous contacter </a>
		</div>
		
		
		 <div class="conteneur1" class="col-sm-6 col-md-4 col-lg-2">
                   	<h1> SHARED-SERVER</h1>
                   	<p> Voulez-vous faciliter le partage de fichier dans votre entreprise ou dans votre société? Vous êtes dans le bon endroit. Sharedserver est  une plateforme disponible en réseau  local et sur  mobile android qui permet de faire cela. Elle vous donne une expérience de partage de fichier: fluide, rapide et sécurisé. Vous pouvez aussi discuter avec les  personnels dans votre entreprise ou société grâce au chat et <a class="lienvoip" href="https://fr.wikipedia.org/wiki/Voix_sur_IP "> VOIP </a>. Sans oublier que vous pouviez aussi stocker vos fichiers  personnels dans cette plateforme sans problème. 
                   	</p>      
            	</div>
            	
            	
            
            	<div class="boutons" class="col-sm-6 col-md-4 col-lg-2"> 
            		<button type="button" class="btn btn-outline-info" href="#myModal"  data-toggle="modal" >Se connecter</button> 
            		<button onclick='window.location="create.php"' type="button" class="btn btn-outline-danger">S'inscrire gratuitement maintenant</button>
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
					<form action="se_connecter.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nom d'utilisateur ou adresse email" name="connectmail" >
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mot de passe" name="connectmdp" >
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-block btn-lg" name="se_connecter" value="Login">
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
		
	
	</body>
</html>
