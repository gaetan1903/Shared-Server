<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="public/img/fav.png" />
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
<link rel="stylesheet" type="text/css" href="public/css/create.css">
<style type="text/css">
	
	
</style>
</head>
<body>


<div class="signup-form">
    <form action="index.php?action=inscription" method="post">
		<h2>S'inscrire</h2>
		<p>Entrez les informations necéssaires s'il vous plait</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="user_name" placeholder="Nom d'utilisateur" required="required">
			</div>
        </div>
        <div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
			<input type="email" class="form-control" name="email" placeholder="Email" required="required">
		</div>
        </div>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
			<input type="password" class="form-control" name="passwd" placeholder="Mot de passe" required="required">
		</div>
        </div>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-lock"></i>
				<i class="fa fa-check"></i>
			</span>
			<input type="password" class="form-control" name="confirmation_passwd" placeholder="Confirmer le mot de passe" required="required">
		</div>
        </div>
        <div class="form-group">
		<label class="checkbox-inline"><input type="checkbox" required="required"> J'accepte <a href="#"><b> les conditions d'utilisation </b></a> &amp; <a href="#"><b>Privacy Policy </b></a></label>
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
<div class="text-center"> <b> Avez-vous déjà un compte? </b> <a  href="index.php">Se connecter ici</a></div>
</div>
<script src="assets/js/YouTubePopUp.jquery.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>