<?php
// Connexion à la BDD
$host = 'mysql:host=localhost;dbname=post_it';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
$pdo = new PDO($host, $login, $password, $options);

// Création de la variables contenant les éventuels messages d'erreur
$msg_titre = '';
$msg_mess = '';

// Création de la variables contenant les actions dans la bdd (affiché sur le post-it 'action')
$action = '';