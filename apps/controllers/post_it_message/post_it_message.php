<?php
// le controller

// importation du model
include './apps/models/post_it_message/post_it_message.php';

// Création de la variables contenant les éventuels messages d'erreur
$msg = '';
// Intérupteur de déclenchement de l'ecriture dans la BDD
$erreur = false;

if (isset($_GET['action'])) {
    // print_r($_POST);

    if($_GET['action'] == 'statut'){
        // ------------------------------------------------------------------------------------
        // Modification du 'statut' des post-it
        // ------------------------------------------------------------------------------------
    
        if (isset($_GET['id']) && isset($_GET['statut'])) {
        
            // statut = 0 -> post-it non tagé
            // statut = 1 -> post-it validé
            // statut = 2 -> post-it barré
        
            // incrémentation du statut
            $id = $_GET['id'];
            $statut = $_GET['statut'] + 1;
        
            // Remise a '0' du statut car ne doit pas dépasser la valeur '2'
            if ($statut == 3) {
                $statut = 0;
            };
        
            $action .= 'Statut post-it ' . $id . ' modifié';
            $enregistrement = $pdo->prepare('UPDATE tache SET statut_post=:statut_post WHERE id_post = :edit_id');
            $enregistrement->bindParam(':statut_post', $statut, PDO::PARAM_STR);
            $enregistrement->bindParam(':edit_id', $id, PDO::PARAM_STR);
            $enregistrement->execute();
            header('location: ./');
        };
    }

    // ------------------------------------------------------------------------------------
    // Edition d'un post-it
    // ------------------------------------------------------------------------------------
    if($_GET['action'] == 'edit'){
        // Contrôle et enregistrement du post-it édité, dans la bdd
        if (isset($_GET['id']) && isset($_POST['titre_post']) && isset($_POST['message_post'])) {

            $id = $_GET['id'];

            $titre_post = trim($_POST['titre_post']);
            $titre_post = htmlspecialchars($titre_post);
        
            $message_post = trim($_POST['message_post']);
            $message_post = htmlspecialchars($message_post);
        
            $taille_titre_post = iconv_strlen($titre_post);
            $taille_message_post = iconv_strlen($message_post);
        
            if (empty($titre_post)) {
                $erreur = true;
                $msg .= '<li>Le titre est vide !</li>';
            };
        
            if (empty($message_post)) {
                $erreur = true;
                $msg .= '<li>Le message est vide !</li>';
            };
        
            if ($taille_titre_post > 25) {
                $erreur = true;
                $msg .= '<li>La taille du titre dépasse 25 caractères !</li>';
            }
        
            if ($taille_message_post > 130) {
                $erreur = true;
                $msg .= '<li>La taille du message dépasse 130 caractères !</li>';
            }
        
            if ($erreur == false) {
                $action .= 'Post-it ' . $id . ' modifié';
                $enregistrement = $pdo->prepare('UPDATE tache SET titre_post=:titre_post, message_post=:message_post, date_post=NOW() WHERE id_post = :id');
                $enregistrement->bindParam(':titre_post', $titre_post, PDO::PARAM_STR);
                $enregistrement->bindParam(':message_post', $message_post, PDO::PARAM_STR);
                $enregistrement->bindParam(':id', $id, PDO::PARAM_STR);
                $enregistrement->execute();
                header('location: ./');
            };
        };
    };

    // ------------------------------------------------------------------------------------
    // Supprimer un post-it
    // ------------------------------------------------------------------------------------
    if($_GET['action'] == 'supp'){
        $id = $_GET['id'];
        if($id == 'all'){
            // Cette fonction sera désactivé en ligne
            $action .= 'Tout les post-it ont étés suprimés';
            // $liste_titre = $pdo->query('DELETE FROM `tache`');
        }
        else{
            $action .= 'Le post-it id:'. $id. ' a été suprimé';
            $enregistrement = $pdo->prepare('DELETE FROM tache WHERE id_post = :id');
            $enregistrement->bindParam(':id', $id, PDO::PARAM_STR);
            $enregistrement->execute();
        };
        header('location: ./');
    };
};