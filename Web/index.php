<?php
require_once("controller/controller.php");


try{
    if(isset($_GET['action'])){
        $action = htmlspecialchars($_GET['action']);
        if($action == 'se_connecter'){
            $name_or_email = htmlspecialchars($_POST['name_or_email']);
            $passwd = htmlspecialchars($_POST['passwd']);
            login($name_or_email, $passwd);
        }

        elseif($action == 'connecter'){
            if(isset($_GET['user_name']) and isset($_GET['id'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                list_file($user_name, $id);
                mise_a_jour_temps_connection($user_name);
            }
        }

        elseif($action == 'inscrire'){
            inscrire();
        }


        elseif($action == 'profil'){
            if(isset($_GET['user_name']) and isset($_GET['id'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                afficahge_profil($user_name, $id);
            }
        }

        elseif($action == 'modif_pro'){
            if(isset($_GET['user_name']) and isset($_GET['id'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                modify_profil($user_name, $id);
            }
        }

        elseif($action == 'rejoindre_groupe'){
            if(isset($_GET['user_name']) and isset($_GET['id'])
            and isset($_GET['groupe_name'])){
                $groupe_name = htmlspecialchars($_GET['groupe_name']);
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                rejoindre_groupe($groupe_name, $user_name, $id);

            }
        }

        elseif($action == 'demande_integration'){
            if(isset($_GET['user_name']) and isset($_GET['id'])
            and isset($_GET['groupe_name'])){
                $groupe_name = htmlspecialchars($_GET['groupe_name']);
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                demande_integration($groupe_name, $user_name, $id);

            }
        }

        elseif($action == 'information_modify_profil'){
            if(isset($_GET['user_name']) and isset($_GET['id'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                $nom = htmlspecialchars($_POST['nom']);
                $email = htmlspecialchars($_POST['email']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $phone = htmlspecialchars($_POST['phone']);
                information_modify_profil($nom, $email, $prenom, $phone, $user_name, $id);
            }
        }

        elseif($action == 'information_modify_mdp'){
            if(isset($_GET['user_name']) and isset($_GET['id'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                $mdp_actuell = htmlspecialchars($_POST['mdp_actuel']);
                $new_mdp = htmlspecialchars($_POST['new_mdp']);
                $new_mdp2 = htmlspecialchars($_POST['new_mdp2']);
                information_modify_mdp($user_name, $id, $mdp_actuell, $new_mdp, $new_mdp2);
            }
        }

        elseif($action == "ajouter_pdp"){
            if(isset($_GET['user_name']) and isset($_GET['id'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                $oFileInfos = $_FILES["image"]; 
                $image_name= $oFileInfos["name"]; 
                $image_name = str_replace(' ', '_', $image_name);
                $image_temporaire = $oFileInfos["tmp_name"]; 
                $code_erreur = $oFileInfos["error"]; 
                $destination = "public/stockage/users/$user_name/$image_name";
                $groupe_name = "".$user_name."_pdp";
                $description_file = "pdp";
                
                insertion_fichier($id, $image_temporaire, $code_erreur, $user_name, $image_name, $groupe_name, $description_file, $destination);
            }
        }

        elseif($action == 'inscription'){
            $user_name = htmlspecialchars($_POST['user_name']);
            $email = htmlspecialchars($_POST['email']);
            $passwd = htmlspecialchars($_POST['passwd']);
            $confirmation_passwd = htmlspecialchars($_POST['confirmation_passwd']);
            inscription($user_name, $email, $passwd, $confirmation_passwd);
        }

        elseif($action == 'se_deconnecter'){
            if(isset($_GET['user_name'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                se_deconnecter($user_name);
            }
        }

        elseif($action == 'create_groupe' and isset($_GET['user_name']) and isset($_GET['id'])){
            $user_name = htmlspecialchars($_GET['user_name']);
            $name_new_groupe = htmlspecialchars($_POST['name_new_groupe']);
            $id = htmlspecialchars($_GET['id']);
            new_groupe($user_name, $name_new_groupe, $id);
        }

        elseif($action == 'rechercher' and isset($_GET['user_name']) and isset($_GET['id'])){
            $rechercher = htmlspecialchars($_POST['search']);
            $user_name = htmlspecialchars($_GET['user_name']);
            $id = htmlspecialchars($_GET['id']);
            rechercher($rechercher, $user_name, $id);
        }

        elseif($action == 'quitter_groupe' and isset($_GET['user_name']) and isset($_GET['id']) 
            and isset($_GET['groupe_name'])){
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);
                $groupe_name = htmlspecialchars($_GET['groupe_name']);
                quitter_groupe($user_name, $id, $groupe_name);
            }

        elseif($action == 'ajouter_membre'){
            ajouter_membre();
        }

        elseif($action == 'insertion_membre' and isset($_GET['name_groupe'])){
            $name_insert_groupe = htmlspecialchars($_POST['user_name']);
            $droit_ajout = htmlspecialchars($_POST['ajouter_autre_membre']);
            $droit_suppr_file = htmlspecialchars($_POST['supprimer_file']);
            $name_groupe = htmlspecialchars($_GET['name_groupe']);
            insert_new_member($name_insert_groupe, $droit_ajout, $droit_suppr_file, $name_groupe);
        }

        elseif($action == 'my_groupe' and isset($_GET['groupe_name']) and 
            isset($_GET['user_name']) and isset($_GET['id'])){
                $groupe_name = htmlspecialchars($_GET['groupe_name']);
                $user_name = htmlspecialchars($_GET['user_name']);
                $id = htmlspecialchars($_GET['id']);

                list_file_my_groupe($groupe_name, $user_name, $id);
                //mise_a_jour_temps_connection($user_name);
        }

        elseif($action == "delete_file" and isset($_GET['name_prop']) and isset($_GET['type']) and 
            isset($_GET['name_file']) and isset($_GET['groupe_file'])){
                $name_file = htmlspecialchars($_GET['name_file']);
                $groupe_file = htmlspecialchars($_GET['groupe_file']);
                $name_prop = htmlspecialchars($_GET['name_prop']);
                $type = htmlspecialchars($_GET['type']);

                delete_file($name_file, $groupe_file, $name_prop, $type);

        }

        elseif($action == "delete_file_my_groupe" and isset($_GET['name_prop']) and isset($_GET['type']) and 
        isset($_GET['name_file']) and isset($_GET['groupe_file']) and isset($_GET['user_name'])){
            $name_file = htmlspecialchars($_GET['name_file']);
            $groupe_file = htmlspecialchars($_GET['groupe_file']);
            $name_prop = htmlspecialchars($_GET['name_prop']);
            $type = htmlspecialchars($_GET['type']);
            $user_name = htmlspecialchars($_GET['user_name']);
            delete_file_my_groupe($name_file, $groupe_file, $name_prop, $type, $user_name);
        }

        elseif($action == 'ajouter_fichier'){
            if(isset($_POST['envoyer_fichier']) and isset($_FILES['fichier'])){
                $oFileInfos = $_FILES["fichier"]; 
                $file_name= $oFileInfos["name"]; 
                $file_name = str_replace(' ', '_', $file_name);
                $type_mime = $oFileInfos["type"]; 
                $taille = $oFileInfos["size"]; 
                $fichier_temporaire = $oFileInfos["tmp_name"]; 
                $code_erreur = $oFileInfos["error"]; 
                $description_file = "no";

                session_start();
                $user_name = $_SESSION['user_name'];
                $groupe_name = $_SESSION['groupe_actif'];
                $id = $_SESSION['id'];
                if($user_name == $groupe_name){
                    $destination = "public/stockage/users/$user_name/$file_name";
                }
                else{
                    $destination = "public/stockage/groupe/$groupe_name/$file_name";
                }
                insertion_fichier($id, $fichier_temporaire, $code_erreur, $user_name, $file_name,
                                    $groupe_name, $description_file, $destination);
            }
            else{
                throw new Exception("Aucun fichier envoyer");
            }
        }
        
    }
    else{
        
        page1();
    }
    
    //verification_user_connecter();
}
catch(Exception $e){
    echo "Erreur :".$e->getMessage();
}