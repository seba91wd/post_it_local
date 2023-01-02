<?php
// le model
// importé dans le fichier ./controller/post_it_message/post_it_message.php

// Sélèction des données pour affichage sur les post-it
$liste_post = $pdo->query('SELECT id_post, titre_post, message_post, statut_post, DATE_FORMAT(date_post, "%d/%m/%Y %H:%i:%s") AS date_post_fr FROM tache ORDER BY date_post ASC');
?>