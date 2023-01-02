<?php
include './apps/controllers/post_it_formulaire/post_it_formulaire.php'
?>
<section class="p_it_formulaire">
    <link rel='stylesheet' type='text/css' href='./apps/assets/style/post_it_formulaire.css'>
    <?php
        if($msg_titre != ''){
            echo '<div class="p_it_form_msg">' . $msg_titre . '</div>';
        };
        if($msg_mess != ''){
            echo '<div class="p_it_form_msg">' . $msg_mess . '</div>';
        }
    ?>
    <form method='post' enctype='multipart/form-data'>
        <input type='text' class="p_it_form titre_post" name='titre_post'>
        <textarea type='text' class="p_it_form message_post" name='message_post'></textarea>
        <input type='submit' class="p_it_form btn_valider" name='valider' value='Valider'>
    </form>
</section>