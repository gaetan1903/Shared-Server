<?php
    $extension_fic = array('bat', 'doc', 'docx', 'exe', 'gz', 'odt', 'pps', 'ppt', 'rar', 'tar', 'xls', 'xlsx', 'zip', 
    'XML', 'sh', 'h', 'py', 'odp', 'ods', 'odg', 'pdf', 'txt', 'php', 'html');
    $extension_image = array('bmp', 'gif', 'iso', 'jpeg', 'jpg', 'png', 'eps', 'psd', 'psp', 'tif', 'tiff');
    $extension_audio = array('aac', 'mid', 'AAC', 'aac');
    $extension_audio_lisable = array('mp3', 'wav', 'ogg');
    $extension_video = array('avi', 'mkv', 'mov', 'mpg', 'qt', 'ra', 'ram', 'wmv', 'ts');
    $extension_video_lisable = array('mp4', 'webm', 'ogg');

    $extension_a_down = strtolower(substr(strrchr($name_file, '.'), 1));
?>
 
            
<?php
    if(in_array($extension_a_down, $extension_fic)){
?>  
    <div class="col-lg-3 col-md-6">
        <div class="team layout-2">
            <div class="img-team">
                <div class="img-team">
                    <img src="public/image/fic_new.png" alt="">
                </div>	
            </div>
            <br><br>
            <div class="padding-20px">
                <h3><?= $name_file ?></h3>
                <h3>Propriétaire:<?= $name_prop ?></h3>
                <h3>Groupe: <?= $groupe_file ?></h3>
                <h3>Description: <?= $description_file ?></h3>
                <h3>Date upload: <?= $date_upload_file ?></h3>
            </div>
            <ul class="social-list">
                <li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
                <?php
                if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
                    ?>
                        <li><a href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
                    <?php
                }
                ?>
                                
            </ul>
        </div>
    </div>

<?php
    }
    elseif(in_array($extension_a_down, $extension_image)){

        if($type == 'groupe'){
            $chemin_file = "public/stockage/groupe/$groupe_file/$name_file";
    
        }
        else{
            $chemin_file = "public/stockage/users/$groupe_file/$name_file";
        }
?>

    <div class="col-lg-3 col-md-6">
        <div class="team layout-2">
            <div class="img-team">
                    <div class="img-team">
                        <img src=<?= $chemin_file ?> alt="">
                    </div>	
            </div>
            <div class="padding-20px">
                <h3><?= $name_file ?><br></h3>
                <h3>Propriétaire: <?= $name_prop ?></h3>
                <h3>Groupe: <?= $groupe_file ?></h3>
                <h3>Description:  <?= $description_file ?></h3>
                <h3>Date upload: <?= $date_upload_file ?></h3>
            </div>
            <ul class="social-list">
            <li><a href=<?= "$destination" ?>><i class="fa fa-download" aria-hidden="true"></i></a></li>
            <?php
                if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
                    ?>
                        <li><a href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
                    <?php
                }
            ?>

                    
                    
            </ul>
        </div>
    </div>

<?php
    }
    elseif(in_array($extension_a_down, $extension_audio)){
?>

<div class="col-lg-3 col-md-6">
        <div class="team layout-2">
            <div class="img-team">
                <div class="img-team">
                    <img src="public/image/audio_new.png" alt="">
                </div>	
            </div>
            <br><br>
            <div class="padding-20px">
                <h3><?= $name_file ?></h3>
                <h3>Propriétaire:<?= $name_prop ?></h3>
                <h3>Groupe: <?= $groupe_file ?></h3>
                <h3>Description: <?= $description_file ?></h3>
                <h3>Date upload: <?= $date_upload_file ?></h3>
            </div>
            <ul class="social-list">
                <li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
                <?php
                if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
                    ?>
                        <li><a href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
                    <?php
                }
                ?>
                                
            </ul>
        </div>
    </div>

<?php
    }

    elseif(in_array($extension_a_down, $extension_audio_lisable)){

        if($type == 'groupe'){
            $chemin_file = "public/stockage/groupe/$groupe_file/$name_file";
            ?>
            <audio controls> 
                <source src=<?= $chemin_file ?> type="audio/mp3">
            </audio>
    
            <?php
    
        }
        else{
            $chemin_file = "public/stockage/users/$groupe_file/$name_file";
            ?>
            <audio controls> 
                <source src=<?= $chemin_file ?> type="audio/mp3">
            </audio>
    
            <?php
        }
    
        ?>

<div class="col-lg-3 col-md-6">
        <div class="team layout-2">
            <div class="img-team">
                <div class="img-team">
                    <img src="public/image/audio_new.png" alt="">
                </div>	
            </div>
            <br><br>
            <div class="padding-20px">
                <h3><?= $name_file ?></h3>
                <h3>Propriétaire:<?= $name_prop ?></h3>
                <h3>Groupe: <?= $groupe_file ?></h3>
                <h3>Description: <?= $description_file ?></h3>
                <h3>Date upload: <?= $date_upload_file ?></h3>
            </div>
            <ul class="social-list">
                <li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
                <?php
                if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
                    ?>
                        <li><a href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
                    <?php
                }
                ?>
                                
            </ul>
        </div>
    </div>



<?php
    }

    elseif(in_array($extension_a_down, $extension_video)){
?>

<div class="col-lg-3 col-md-6">
        <div class="team layout-2">
            <div class="img-team">
                <div class="img-team">
                    <img src="public/image/audio_new.png" alt="">
                </div>	
            </div>
            <br><br>
            <div class="padding-20px">
                <h3><?= $name_file ?></h3>
                <h3>Propriétaire:<?= $name_prop ?></h3>
                <h3>Groupe: <?= $groupe_file ?></h3>
                <h3>Description: <?= $description_file ?></h3>
                <h3>Date upload: <?= $date_upload_file ?></h3>
            </div>
            <ul class="social-list">
                <li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
                <?php
                if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
                    ?>
                        <li><a href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
                    <?php
                }
                ?>
                                
            </ul>
        </div>
    </div>

<?php
    }


    elseif(in_array($extension_a_down, $extension_video_lisable)){

        if($type == 'groupe'){
            $chemin_file = "public/stockage/groupe/$groupe_file/$name_file";
            ?>
        <video controls height="250%", width="250%"> 
              <source src=<?= $chemin_file ?> type="video/mp4">
        </video>
    
            <?php
    
        }
        else{
            $chemin_file = "public/stockage/users/$groupe_file/$name_file";
            ?>
            <video controls> 
                <source src=<?= $chemin_file ?> type="video/mp4">
            </video>
    
            <?php
        }
    
        ?>

<div class="col-lg-3 col-md-6">
        <div class="team layout-2">
            <div class="img-team">
                <div class="img-team">
                    <img src="public/image/audio_new.png" alt="">
                </div>	
            </div>
            <br><br>
            <div class="padding-20px">
                <h3><?= $name_file ?></h3>
                <h3>Propriétaire:<?= $name_prop ?></h3>
                <h3>Groupe: <?= $groupe_file ?></h3>
                <h3>Description: <?= $description_file ?></h3>
                <h3>Date upload: <?= $date_upload_file ?></h3>
            </div>
            <ul class="social-list">
                <li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
                <?php
                if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
                    ?>
                        <li><a href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
                    <?php
                }
                ?>
                                
            </ul>
        </div>
    </div>



<?php
    }
    elseif(in_array($extension_a_down, $extension_video)){
        ?>
        
        <div class="col-lg-3 col-md-6">
                <div class="team layout-2">
                    <div class="img-team">
                        <div class="img-team">
                            <img src="public/image/audio_new.png" alt="">
                        </div>	
                    </div>
                    <br><br>
                    <div class="padding-20px">
                        <h3><?= $name_file ?></h3>
                        <h3>Propriétaire:<?= $name_prop ?></h3>
                        <h3>Groupe: <?= $groupe_file ?></h3>
                        <h3>Description: <?= $description_file ?></h3>
                        <h3>Date upload: <?= $date_upload_file ?></h3>
                    </div>
                    <ul class="social-list">
                        <li><a href=<?= "$destination" ?> ><i class="fa fa-download" aria-hidden="true"></i></a></li>
                        <?php
                        if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
                            ?>
                                <li><a href="index.php?action=delete_file&name_file=<?= $name_file ?>&name_prop=<?= $name_prop ?>&groupe_file=<?= $groupe_file ?>&type=<?= $type ?>"><i class="fa fa-close" aria-hidden="true"></i></a></li>
                            <?php
                        }
                        ?>
                                        
                    </ul>
                </div>
            </div>
        
        <?php
            }
?>

            </div>

        </div>

    </div>
</div>