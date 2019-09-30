<?php
    $title = "Ajouter";
    ob_start();
    require('public/link_bt/link_bt_inscription.html');
    $entete = ob_get_clean();
    ob_start();
    require('public/style/style_inscription.html');
    $style = ob_get_clean();
    ob_start();
    session_start();
    $name_groupe = $_SESSION['groupe_actif'];
    $user_name = $_SESSION['user_name'];
    $id = $_SESSION['id'];
?>

    <div class="signup-form">
        <form action="index.php?action=insertion_membre&name_groupe=<?=$name_groupe ?>" method="POST">
            <h2><?= $name_groupe ?></h2>
            <p>Ajouter des membres</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="user_name" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label class="checkbox-inline" ><input type="checkbox" name="ajouter_autre_membre" checked="checked"> Droit d'ajout des membres</a></label>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                <label class="checkbox-inline" ><input type="checkbox" name="supprimer_file"> Droit de suppression des fichiers</a></label>
                </div>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="s_inscrire">Ajouter</button>
            </div>
            <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur."</font> <br><br>";
            }
            ?>
             <a href="index.php?action=my_groupe&groupe_name=<?= $name_groupe?>&user_name=<?=$user_name?>&id=<?= $id ?>">Cliquer ici pour aller vers <?= $name_groupe?> </a></label>

        </form>

<?php
$content = ob_get_clean();
require("template.php");
?>