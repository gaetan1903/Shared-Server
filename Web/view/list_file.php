<?php

$extension_fic = array('bat', 'doc', 'docx', 'exe', 'gz', 'odt', 'pps', 'ppt', 'rar', 'tar', 'xls', 'xlsx', 'zip', 
'XML', 'sh', 'h', 'py', 'odp', 'ods', 'odg', 'pdf', 'txt', 'php', 'html');
$extension_image = array('bmp', 'gif', 'iso', 'jpeg', 'jpg', 'png', 'eps', 'psd', 'psp', 'tif', 'tiff');
$extension_audio = array('aac', 'mid', 'AAC', 'aac');
$extension_audio_lisable = array('mp3', 'wav', 'ogg');
$extension_video = array('avi', 'mkv', 'mov', 'mpg', 'qt', 'ra', 'ram', 'wmv', 'ts');
$extension_video_lisable = array('mp4', 'webm', 'ogg');

$extension_a_down = strtolower(substr(strrchr($name_file, '.'), 1));


if(strlen($name_file)>32)
{
    $name_file_list = str_replace('_', ' ', substr($name_file, 0, 28));
    $name_file_list = "$name_file...";
}
if(strlen($name_file)<=19)
{
    $name_file_list = substr($name_file, 0, 19);
    $name_file_list = "$name_file <br/>";
}
if(strlen($groupe_file)<=19)
{
    $groupe_file_list = substr($groupe_file, 0, 19);
    $groupe_file_list = "$groupe_file <br/>";
}
if(in_array($extension_a_down, $extension_fic)){
    echo '<div id="desc_fic"><img class="media-object" src="public/image/fic_new.png">'.$name_file_list.'<br/>
    Propriétaire: '.$name_prop.'<br/>Groupe: '.$groupe_file_list.'<br/>Description:'.$description_file.'<br/>Upload: '.$date_upload_file.'
    <br/></div>';
    echo "<a href=\"$destination\">Download</a>";
    if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
        echo " _ <a href='index.php?action=delete_file&name_file=$name_file&name_prop=$name_prop&groupe_file=$groupe_file&type=$type'> supprimer </a><br><br>";
    }
    else{
        echo "<br><br>";
    }

}
elseif(in_array($extension_a_down, $extension_image)){

    if($type == 'groupe'){
        $chemin_file = "public/stockage/groupe/$groupe_file/$name_file";
        ?>      
            <img src=<?= $chemin_file ?> />
        <?php

    }
    else{
        $chemin_file = "public/stockage/users/$groupe_file/$name_file";
        ?>
            <img src=<?= $chemin_file ?> />
        <?php
    }

    echo '<div id="desc_fic">'.$name_file_list.'<br/>
    Propriétaire: '.$name_prop.'<br/>Groupe: '.$groupe_file_list.'<br/>Description:'.$description_file.'<br/>Upload: '.$date_upload_file.'
    <br/></div>';
    echo "<a href=\"$destination\">Download</a>";
    if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
        echo " _ <a href='index.php?action=delete_file&name_file=$name_file&name_prop=$name_prop&groupe_file=$groupe_file&type=$type'> supprimer </a><br><br>";
    }
    else{
        echo "<br><br>";
    }
}

elseif(in_array($extension_a_down, $extension_audio)){
    echo '<div id="desc_fic"><img class="media-object" src="public/image/audio_new.png">'.$name_file_list.'<br/>
    Propriétaire: '.$name_prop.'<br/>Groupe: '.$groupe_file_list.'<br/>Description:'.$description_file.'<br/>Upload: '.$date_upload_file.'
    <br/></div>';
    echo "<a href=\"$destination\">Download</a>";
    if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
        echo " _ <a href='index.php?action=delete_file&name_file=$name_file&name_prop=$name_prop&groupe_file=$groupe_file&type=$type'> supprimer </a><br><br>";
    }
    else{
        echo "<br><br>";
    }
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

    echo '<div id="desc_fic">'.$name_file_list.'<br/>
    Propriétaire: '.$name_prop.'<br/>Groupe: '.$groupe_file_list.'<br/>Description:'.$description_file.'<br/>Upload: '.$date_upload_file.'
    <br/></div>';
    echo "<a href=\"$destination\">Download</a>";
    if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
        echo " _ <a href='index.php?action=delete_file&name_file=$name_file&name_prop=$name_prop&groupe_file=$groupe_file&type=$type'> supprimer </a><br><br>";
    }
    else{
        echo "<br><br>";
    }
}
elseif(in_array($extension_a_down, $extension_video)){
    echo '<div id="desc_fic"><img class="media-object" src="public/image/video_new.png">'.$name_file_list.'<br/>
    Propriétaire: '.$name_prop.'<br/>Groupe: '.$groupe_file_list.'<br/>Description:'.$description_file.'<br/>Upload: '.$date_upload_file.'
    <br/></div>';
    echo "<a href=\"$destination\">Download</a>";
    if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
        echo " _ <a href='index.php?action=delete_file&name_file=$name_file&name_prop=$name_prop&groupe_file=$groupe_file&type=$type'> supprimer </a><br><br>";
    }
    else{
        echo "<br><br>";
    }
}
elseif(in_array($extension_a_down, $extension_video_lisable)){
    if($type == 'groupe'){
        $chemin_file = "public/stockage/groupe/$groupe_file/$name_file";
        ?>
        <video controls> 
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

    echo '<div id="desc_fic">'.$name_file_list.'<br/>
    Propriétaire: '.$name_prop.'<br/>Groupe: '.$groupe_file_list.'<br/>Description:'.$description_file.'<br/>Upload: '.$date_upload_file.'
    <br/></div>';
    echo "<a href=\"$destination\">Download</a>";
    if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
        echo " _ supprimer <br><br>";
    }
    else{
        echo "<br><br>";
    }

}
else{
    echo '<div id="desc_fic"><img class="media-object" src="public/image/autre_new.png">'.$name_file_list.'<br/>
    Propriétaire: '.$name_prop.'<br/>Groupe: '.$groupe_file_list.'<br>Description:'.$description_file.'<br>Upload: '.$date_upload_file.'
    <br></div>';
    echo "<a href=\"$destination\">Download</a>";
    if($_SESSION['groupe_actif'] == $user_name or $user_name == $name_prop){
        echo " _ <a href='index.php?action=delete_file&name_file=$name_file&name_prop=$name_prop&groupe_file=$groupe_file&type=$type'> supprimer </a><br><br>";
        
    }
    else{
        echo "<br><br>";
    }
}