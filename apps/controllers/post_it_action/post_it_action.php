<?php
// require './index.php';
include './apps/models/post_it_action/post_it_action.php';

// Si le nombre d'entrées est supérieur ou égal à '5', on supprime la ligne la premier ligne
$bdd_actions = $pdo->query('SELECT * FROM action');
if ($bdd_actions->rowCount() >= 5) {
    $pdo->query('DELETE FROM action LIMIT 1');
};

if ($action != '') {
    $enregistrement = $pdo->prepare('INSERT INTO action (id_action, text_action) VALUES (NULL, :text_action)');
    $enregistrement->bindParam(':text_action', $action, PDO::PARAM_STR);
    $enregistrement->execute();
};