<?php
include './apps/inc/init.php';
// debug en-ligne
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post-it</title>
    <link rel='stylesheet' type='text/css' href='./apps/assets/style/index.css'>
</head>

<body>
    <?php 
        include './apps/views/post_it_option/post_it_option.php';
        include './apps/views/post_it_formulaire/post_it_formulaire.php';
        include './apps/views/post_it_message/post_it_message.php';
        // include './apps/views/post_it_action/post_it_action.php';
    ?>
    <script type="module" src="./apps/assets/js/signature.js"></script>
    <script type="module" src="./apps/assets/js/script_index.js"></script>
    <script src="./apps/assets/js/oneko.js"></script>
</body>

</html>