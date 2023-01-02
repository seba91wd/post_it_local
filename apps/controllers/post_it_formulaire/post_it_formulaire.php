<?php
// Intérupteur de déclenchement de l'ecriture dans la BDD
$erreur = false;

// Controle
if(isset($_POST['valider']) && $_POST['valider'] == 'Valider'){
    if(isset($_POST['titre_post']) && isset($_POST['message_post'])){
        $titre_post = trim($_POST['titre_post']);
        $titre_post = htmlspecialchars($titre_post);
    
        $message_post = trim($_POST['message_post']);
        $message_post = htmlspecialchars($message_post);
    
        $taille_titre_post = iconv_strlen($titre_post);
        $taille_message_post = iconv_strlen($message_post);
    
        if(empty($titre_post)){
            $erreur = true;
            $msg_titre .= '<p class="p_it_form_msg_titre">Le titre est vide !</p><br>';
        };
        
        if(empty($message_post)){
            $erreur = true;
            $msg_mess .= '<p class="p_it_form_msg_mess">Le message est vide !</p><br>';
        };
        
        if($taille_titre_post > 25){
            $erreur = true;
            $msg_titre .= '<p class="p_it_form_msg_titre">25 caractères max</p>';
        };
        
        if($taille_message_post > 130){
            $erreur = true;
            $msg_mess .= '<p class="p_it_form_msg_mess">130 caractères max</p>';
        };

        if ($erreur == false){
            $action .= 'Nouveau post-it enregistré';
            $enregistrement = $pdo->prepare('INSERT INTO tache (id_post, titre_post, message_post, date_post) VALUES (NULL, :titre_post, :message_post, NOW() )');
            $enregistrement->bindParam(':titre_post', $titre_post, PDO::PARAM_STR);
            $enregistrement->bindParam(':message_post', $message_post, PDO::PARAM_STR);
            $enregistrement->execute();
            header('location: ./');
        };
    };
};