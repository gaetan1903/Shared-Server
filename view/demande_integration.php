<?php
    $title = "Demande";
    ob_start();
    require('public/link_bt/link_bt_inscription.html');
    $entete = ob_get_clean();
    ob_start();
    require('public/style/style_inscription.html');
    $style = ob_get_clean();
    ob_start();
    session_start();
    $name_groupe_user = $_SESSION['groupe_actif'];
    $user_name_user = $_SESSION['user_name'];
    $id_user = $_SESSION['id'];
?>

    <div class="signup-form">
        <form action="index.php?action=demande_integration&amp;user_name=<?= $user_name ?>&amp;id=<?= $id ?>&amp;groupe_name=<?= $groupe_name ?>" method="POST">
            <h2><?= $groupe_name ?></h2>
            <p>Rejoindre le groupe <?= $groupe_name ?></p>
            <hr>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="rejoindre">Valider</button>
            </div>
            <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur."</font> <br><br>";
            }
            ?>
            <a href="index.php?action=my_groupe&groupe_name=<?= $name_groupe_user?>&user_name=<?=$user_name_user?>&id=<?= $id_user ?>">Cliquer ici pour aller vers <?= $name_groupe_user?> </a></label>
        </form>

<?php
$content = ob_get_clean();
require("template.php");
?>