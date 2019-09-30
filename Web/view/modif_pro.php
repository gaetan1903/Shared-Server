<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="public/img/fav.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <link rel="icon" type="image/png" href="" />
    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="public/css/css_modif_pro/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="public/css/css_modif_pro/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="public/css/css_modif_pro/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="public/css/css_modif_pro/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="public/css/css_modif_pro/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="public/css/css_modif_pro/superlist.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="public/css/css_modif_pro/icon?family=Material+Icons">
    <link href="public/css/css_modif_pro/modif_pro.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Modifier_profile</title>
    <?php
    require("public/link_bt/link_bt_acceuil.html");
    ?>
</head>


<script type="text/javascript">
/* Voici la fonction javascript qui change la propriété "display"
pour afficher ou non le div selon que ce soit "none" ou "block". */

function AfficherMasquer()
		{
			divInfo1 = document.getElementById('divacacher1');
			divInfo2 = document.getElementById('divacacher2');
			divInfo3 = document.getElementById('divacacher3');

				if (divInfo1.style.display == 'none')
			{				
				divInfo1.style.display = 'block';
				divInfo2.style.display = 'block';
				divInfo3.style.display = 'block';
			}
				else
			{
				divInfo1.style.display = 'none';
				divInfo2.style.display = 'none';
				divInfo3.style.display = 'none';
			}
		}
</script>

<body >



<div class="page-wrapper">
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-lg-3">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="user-photo">
                                    <a href="#">

                                    <?php
									if(isset($pdp_user)){
                                    ?>
                                        <img src=<?= $chemin_pdp ?> alt="User Photo">
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <img src="../public/image/av.png" alt="User Photo">
                                    <?php
                                        }
                                    ?>
                                        
                                        <a href="#myModal_pdp" data-toggle="modal"><span class="user-photo-action">Modifier votre avatar</span></a>
                                    </a>
                                </div><!-- /.user-photo -->
                            </div><!-- /.widget -->

                            <div class="widget">
                                <ul class="menu-advanced">
                                    <li class="active"><a href="#"><i class="fa fa-user"></i> <b> Editer le profile</b></a></li>
                                    <li class="log"><a href="index.php?action=connecter&amp;user_name=<?= $user_name;?>&amp;id=<?= $id;?>"><i class="fa fa-sign-out"></i> Acceuil</a></li>
                                    <li class="log"><a href="index.php?action=se_deconnecter&amp;user_name=<?= $user_name ?>"><i class="fa fa-sign-out"></i> Deconnexion</a></li>
                                </ul>
                            </div><!-- /.widget -->
                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
                                <h1> <b> <i class="fa fa-user"> </i> MODIFIER LE PROFIL </h1>
                            </div><!-- /.page-title -->
                            <form action="index.php?action=information_modify_profil&amp;user_name=<?= $user_name ?>&amp;id=<?= $id ?>" method="POST">
                                <div class="background-white p20 mb30">
                                    <h3 class="page-title">
                                        <b>Information générale </b>
                                        <a href="#"><input type="submit" name="enregistrer" class="btn btn-primary btn-xs pull-right" value="Enregistrer"/></a>
                                    </h3>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label><b> Nom </b> <i class="fa fa-pencil"> </i> </label>
                                            <input type="text" class="form-control" name="nom" value="">
                                        </div><!-- /.form-group -->
                                        <div class="form-group col-sm-6">
                                            <label> <b> E-mail <i class="fa fa-pencil"> </i> </b></label>
                                            <input type="text" class="form-control" name="email" value="">
                                        </div><!-- /.form-group -->
                                        <div class="form-group col-sm-6">
                                            <label><b> Prénom(s) <i class="fa fa-pencil"> </i> </label>
                                            <input type="text" class="form-control" name="prenom" value="">
                                        </div><!-- /.form-group -->
                                        <div class="form-group col-sm-6">
                                            <label> <b>Téléphone <i class="fa fa-pencil"> </i> </label>
                                            <input type="text" class="form-control" name="phone" value="">
                                        </div><!-- /.form-group -->
                                    </div><!-- /.row -->
                                </div>
                            </form>
                            <form action="index.php?action=information_modify_mdp&amp;user_name=<?= $user_name ?>&amp;id=<?= $id ?>" method="POST">
                                <div class="background-white p20 mb30">
                                    <h3 class="page-title">
                                        <b>Securité</b>
                                        <a href="#"><input type="submit" class="btn btn-primary btn-xs pull-right" value="Enregistrer"></a>
                                    </h3>
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> <b> Entrer votre mot de passe actuel <i class="fa fa-pencil" Onclick="AfficherMasquer()" > </i> </label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="mdp_actuel">
                                            </div><!-- /.col-* -->
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="form-horizontal" id="divacacher2">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> <b> Nouveau mot de passe <i class="fa fa-pencil"> </i> </label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="new_mdp">
                                            </div><!-- /.col-* -->
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="form-horizontal" id="divacacher3">
                                        <div class="form-group">
                                                <label class="col-sm-2 control-label"> <b> Retapez le nouveau mot de passe <i class="fa fa-pencil"> </i> </label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="new_mdp2">
                                                </div><!-- /.col-* -->
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->
</div><!-- /.page-wrapper -->


<footer class="layout-dark">
		<div class="copy-right">
			<div class="container padding-tb-50px">
				<div class="row">
					<div class="col-lg-6">
						<div class="copy-right-text text-lg-left text-center sm-mb-15px"><a target="_blank" href="https://shared-server.esti.mg">Shared-server</a> </div>
					</div>
					<div class="col-lg-6">
						<!--  Social -->
						<ul class="social-media list-inline text-lg-right text-center margin-0px text-white">
							<li class="list-inline-item"><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li class="list-inline-item"><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
						<!-- // Social -->
					</div>
				</div>
			</div>
		</div>
	</footer>

<script src="javascript/jquery.js" type="text/javascript"></script>
<script src="javascript/map.js" type="text/javascript"></script>

<script src="javascript/collapse.js" type="text/javascript"></script>
<script src="javascript/carousel.js" type="text/javascript"></script>
<script src="javascript/transition.js" type="text/javascript"></script>
<script src="javascript/dropdown.js" type="text/javascript"></script>
<script src="javascript/tooltip.js" type="text/javascript"></script>
<script src="javascript/tab.js" type="text/javascript"></script>
<script src="javascript/alert.js" type="text/javascript"></script>

<script src="javascript/jquery.colorbox-min.js" type="text/javascript"></script>

<script src="javascript/jquery.flot.min.js" type="text/javascript"></script>
<script src="javascript/jquery.flot.spline.js" type="text/javascript"></script>

<script src="javascript/bootstrap-select.min.js" type="text/javascript"></script>

<script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing" type="text/javascript"></script>

<script type="text/javascript" src="javascript/infobox.js"></script>
<script type="text/javascript" src="javascript/markerclusterer.js"></script>
<script type="text/javascript" src="javascript/jquery-google-map.js"></script>


<script type="text/javascript" src="javascript/fileinput.min.js"></script>

<script src="javascript/superlist.js" type="text/javascript"></script>

<?php
    if(isset($error)){
        echo $error;
    }
    if(isset($notification)){
        echo '<script language="javascript">';
        echo 'alert("'.$notification.'")';
        echo '</script>';
    }

    require("public/modal/add_pdp.php");
?>

</body>
</html>