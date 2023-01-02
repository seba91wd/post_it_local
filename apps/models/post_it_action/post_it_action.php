<?php
// le model
// importé dans le fichier ./controller/post_it_action/post_it_action.php

// Sélection des données pour affichage des actions effectuées
$bdd_actions = $pdo->query('SELECT id_action, text_action FROM action');