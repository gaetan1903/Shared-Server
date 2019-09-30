<?php
require_once("Connect_bdd.php");

class Query_bdd extends Connect_bdd{
    public function connect($name_or_email){
        $bdd = $this->dbconnect();
        $verify_login = $bdd->prepare("SELECT * FROM membre WHERE (user_name = ? OR mail = ?) AND ver = 0 ");
        $verify_login->execute(array($name_or_email,$name_or_email));
        return $verify_login;
    }

    public function insertion_new_user($user_name, $email, $passwd_hash){
        $confirm_mail = 1111;
        $ver = 0;
        $bdd = $this->dbconnect();
        $temps_actuelle = time();
        $insertion_info = $bdd->prepare("INSERT INTO membre(user_name, mail, mdp, confirm_mail, ver, temps_connection) 
                                        VALUES(?,?,?,?,?,?)");
        $insertion_info->execute(array($user_name, $email, $passwd_hash, $confirm_mail, $ver, $temps_actuelle));

        $connection_ssh2 = ssh2_connect("localhost", 22);
        ssh2_auth_password($connection_ssh2, "mm", "azerty1234");
        ssh2_exec($connection_ssh2, "mkdir /var/www/html/public/stockage/users/\"$user_name\" && chmod 777 /var/www/html/public/stockage/users/\"$user_name\"");
        return $insertion_info;
    }

    public function post_files($user_name){
        $bdd = $this->dbconnect();
        $files = $bdd->prepare("SELECT * FROM file WHERE groupe_name=?");
        $files->execute(array($user_name));
        return $files;
    }

    public function select_membre_groupe($groupe_name){
        $bdd = $this->dbconnect();
        $id_membres_groupe = $bdd->prepare("SELECT DISTINCT id FROM Groupe_membre WHERE groupe_name = ? ");
        $id_membres_groupe->execute(array($groupe_name));

        
        while($id_membre_groupe = $id_membres_groupe->fetch()){
            $id_membre = $id_membre_groupe["id"];
            $user_name_tab = $bdd->prepare("SELECT user_name FROM membre WHERE id=?");
            $user_name_tab->execute(array($id_membre));
            $user_name_fetch = $user_name_tab->fetch();
            $user_name = $user_name_fetch['user_name'];
            $user_name_array[] = $user_name;

        }
        return $user_name_array;
    }

    public function user_names(){
        $bdd = $this->dbconnect();
        $all_user_names = $bdd->query("SELECT user_name FROM membre");
        return $all_user_names;
    }

    public function marquer_connecter($user_name, $temps_actuelle){
        $bdd = $this->dbconnect();
        $user_connecter = $bdd->prepare("UPDATE membre SET ver=1 , temps_connection=? WHERE user_name=? ");
        $user_connecter->execute(array($temps_actuelle , $user_name));
        return $user_connecter;
    }

    public function select_temps_deb_connection(){
        $bdd = $this->dbconnect();
        $temps_connection = $bdd->query("SELECT temps_connection FROM membre");
        return $temps_connection;
    }

    public function deconnection_user_inactif($t_connection){
        $bdd = $this->dbconnect();
        $deconnecter_cet_user = $bdd->prepare("UPDATE membre SET ver=0 where temps_connection=?");
        $deconnecter_cet_user->execute(array($t_connection));
        return $deconnecter_cet_user;
    }

    public function modify_temps_connection($user_name){
        $temps_actuelle = time();
        $bdd = $this->dbconnect();
        $update_temps_connection = $bdd->prepare("UPDATE membre SET temps_connection = ? WHERE user_name=?");
        $update_temps_connection->execute(array($temps_actuelle, $user_name));
        return $update_temps_connection;
    }

    public function select_user_connecter(){
        $bdd = $this->dbconnect();
        $users_connecter = $bdd->query("SELECT user_name FROM membre WHERE ver=1");
        return $users_connecter;
    }

    public function user_deconnection($user_name){
        $bdd = $this->dbconnect();
        $deconnecter_user = $bdd->prepare("UPDATE membre SET ver = 0 WHERE user_name = ? ");
        $deconnecter_user->execute(array($user_name));
        return $deconnecter_user;
    }

    public function select_ancien_mdp($user_name){
        $bdd = $this->dbconnect();
        $ancien_mdp = $bdd->prepare("SELECT mdp FROM membre WHERE user_name = ?");
        $ancien_mdp->execute(array($user_name));
        return $ancien_mdp;
    }

    public function insertion_new_mdp($passwd_hash, $user_name){
        $bdd = $this->dbconnect();
        $insert_new_mdp = $bdd->prepare("UPDATE membre SET mdp = ? WHERE user_name = ?");
        $insert_new_mdp->execute(array($passwd_hash, $user_name));
        return $insert_new_mdp;
    }

    public function insert_new_file($user_name, $file_name, $groupe_name, $description_file, $destination){
        $bdd = $this->dbconnect();
        $insert_file = $bdd->prepare('INSERT INTO file(user_name, file_name, groupe_name, description_file) VALUES(?,?,?,?)');
        $insert_file->execute(array($user_name, $file_name, $groupe_name, $description_file));
        
        $connection_ssh2 = ssh2_connect("localhost", 22);
        ssh2_auth_password($connection_ssh2, "mm", "azerty1234");
        ssh2_exec($connection_ssh2, "chmod 777 /var/www/html/\"$destination\"");

        return $insert_file;
    }

    public function delete_file_user($name_file, $groupe_file, $name_prop, $type){
        $bdd = $this->dbconnect();
        $verify_delete = $bdd->prepare("DELETE FROM file WHERE user_name=? and groupe_name=? and file_name=?");
        $verify_delete->execute(array($name_prop,  $groupe_file, $name_file ));

        if($type == "groupe"){
            $chemin = "/var/www/html/public/stockage/groupe";
        }
        elseif($type == "user"){
            $chemin = "/var/www/html/public/stockage/users";
        }

        $connection_ssh2 = ssh2_connect("localhost", 22);
        ssh2_auth_password($connection_ssh2, "mm", "azerty1234");
        ssh2_exec($connection_ssh2, "rm $chemin/\"$groupe_file\"/\"$name_file\"");
        return $verify_delete;
    }

    public function select_groupe_user($id){
        $bdd = $this->dbconnect();
        $groupes_user = $bdd->prepare("SELECT * from Groupe_membre WHERE id =?");
        $groupes_user->execute(array($id));
        return $groupes_user;
    }

    public function select_mes_groupe($user_name){
        $bdd = $this->dbconnect();
        $mes_groupes = $bdd->prepare("SELECT * from groupe WHERE createur_groupe =?");
        $mes_groupes->execute(array($user_name));
        return $mes_groupes;
    }

    public function quitter_groupe_user($id, $groupe_name, $id_groupe){
        $bdd = $this->dbconnect();
        $quitter_groupe = $bdd->prepare("DELETE FROM Groupe_membre WHERE groupe_name = ? and id_groupe = ? and id = ?");
        $quitter_groupe->execute(array($groupe_name, $id_groupe, $id));
        return $quitter_groupe;
    }

    
    public function create_new_groupe($user_name, $name_new_groupe, $id){
        $bdd = $this->dbconnect();
        $create_groupe = $bdd->prepare("INSERT INTO groupe(name_groupe, createur_groupe) VALUES(?, ?)");
        $create_groupe->execute(array($name_new_groupe, $user_name));

        $connection_ssh2 = ssh2_connect("localhost", 22);
        ssh2_auth_password($connection_ssh2, "mm", "azerty1234");
        ssh2_exec($connection_ssh2, "mkdir /var/www/html/public/stockage/groupe/\"$name_new_groupe\" && chmod 777 /var/www/html/public/stockage/groupe/\"$name_new_groupe\"");
        return $create_groupe;
    }

    public function select_createur_groupe($groupe_name){
        $bdd = $this->dbconnect();
        $createur_groupe = $bdd->prepare("SELECT id_groupe, createur_groupe FROM groupe WHERE name_groupe = ? ");
        $createur_groupe->execute(array($groupe_name));
        return $createur_groupe;
    }

    public function insert_notification($groupe_name, $user_name, $id, $id_groupe, $createur_groupe){
        $bdd = $this->dbconnect();
        $insertion_notification = $bdd->prepare("INSERT INTO notification values(?, ?, ?, ?, ?)");
        $insertion_notification->execute(array($user_name, $id, $groupe_name, $id_groupe, $createur_groupe));
        return $insertion_notification;
    }

    public function verify_membre_G($groupe_name, $user_name, $id){
        $bdd = $this->dbconnect();
        $verification_membre_G = $bdd->prepare("SELECT groupe_name, id_groupe, id FROM Groupe_membre WHERE groupe_name = ? and id = ?");
        $verification_membre_G->execute(array($groupe_name, $user_name, $id));
        return $verification_membre_G;
    }

    public function select_all_groupe(){
        $bdd = $this->dbconnect();
        $all_groupes = $bdd->query("SELECT name_groupe from groupe");
        return $all_groupes;
    }

    public function select_files_my_groupe($groupe_name){
        $bdd = $this->dbconnect();
        $files_my_groupe = $bdd->prepare("SELECT * from file WHERE groupe_name =?");
        $files_my_groupe->execute(array($groupe_name));
        return $files_my_groupe;
    }

    public function insertion_member_groupe($name_groupe, $id_groupe, $id, $droit_ajout, $droit_suppr_file){
        $bdd = $this->dbconnect();
        $verify_insert_member = $bdd->prepare("INSERT INTO Groupe_membre(groupe_name, id_groupe, id, droit_ajouter, droit_suppr)
                                                VALUES(?,?,?,?,?) ");
        $verify_insert_member->execute(array($name_groupe, $id_groupe, $id, $droit_ajout, $droit_suppr_file));
        return $verify_insert_member;
    }

    public function insert_info_profil($nom, $email, $prenom, $phone, $user_name){
        $bdd = $this->dbconnect();
            if($prenom !== ""){
            $insert = $bdd->prepare("UPDATE membre SET prenom = ? WHERE user_name = ?");
            $insert->execute(array($prenom, $user_name));
            }
            if($nom !== ""){
            $inse = $bdd->prepare("UPDATE membre SET nom_complet = ? WHERE user_name = ?");
            $inse->execute(array($nom, $user_name));
            }

            if($email !== "" and preg_match("#^[a-z0-9._-]+@esti.mg$#",$email)){
            $inser = $bdd->prepare("UPDATE membre SET mail = ? WHERE user_name = ?");
            $inser->execute(array($email, $user_name));
            }

            if($phone !== ""){
            $ins = $bdd->prepare("UPDATE membre SET phone = ? WHERE user_name = ?");
            $ins->execute(array($phone, $user_name));
            
            }
            return $insert;
        
    }

    public function select_info_user($user_name){
        $bdd = $this->dbconnect();
        $info_user = $bdd->prepare("SELECT * FROM membre WHERE user_name = ? ");
        $info_user->execute(array($user_name));
        return $info_user;
    }

    public function delete_pdp_ancien($groupe_name, $user_name){
        $bdd = $this->dbconnect();

        $pdp_user = $bdd->prepare("SELECT file_name FROM file WHERE groupe_name = ?");
        $pdp_user->execute(array($groupe_name));
        $pdp_user_li = $pdp_user->fetch();
        $pdp_user = $pdp_user_li['file_name'];

        $delete_ancien_pdp = $bdd->prepare("DELETE FROM file WHERE groupe_name = ? ");
        $delete_ancien_pdp->execute(array($groupe_name));

        $connection_ssh2 = ssh2_connect("localhost", 22);
        ssh2_auth_password($connection_ssh2, "mm", "azerty1234");
        ssh2_exec($connection_ssh2, "rm /var/www/html/public/stockage/users/$user_name/\"$pdp_user\"");
        return $delete_ancien_pdp;
    }

    public function select_pdp_user($user_name){
        $bdd = $this->dbconnect();
        $groupe_name = "".$user_name."_pdp";
        $pdp_user = $bdd->prepare("SELECT file_name FROM file WHERE groupe_name = ?");
        $pdp_user->execute(array($groupe_name));
        return $pdp_user;
    }

    public function select_id_user($user_name){
        $bdd = $this->dbconnect();
        $id = $bdd->prepare("SELECT id from membre WHERE user_name = ?");
        $id->execute(array($user_name));
        return $id;
    }

    public function select_id_groupe($name_groupe){
        $bdd = $this->dbconnect();
        $id_groupe = $bdd->prepare("SELECT id_groupe from groupe WHERE name_groupe = ?");
        $id_groupe->execute(array($name_groupe));
        return $id_groupe;
    }

    public function search_groupe($rechercher){
        $bdd = $this->dbconnect();
        $search_groupe = $bdd->query('SELECT name_groupe FROM groupe WHERE name_groupe LIKE "%'.$rechercher.'%"  ');
        return $search_groupe;
    }

    public function search_fichier($rechercher){
        $bdd = $this->dbconnect();
        $search_file = $bdd->query('SELECT file_name, groupe_name FROM file WHERE file_name LIKE "%'.$rechercher.'%" ');
        return $search_file;
    }

    public function search_user($rechercher){
        $bdd = $this->dbconnect();
        $search_user = $bdd->query('SELECT user_name FROM membre WHERE user_name LIKE "%'.$rechercher.'%" ');
        return $search_user;
    }

}