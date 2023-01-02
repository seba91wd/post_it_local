<?php
include './apps/controllers/post_it_message/post_it_message.php';
?>

<link rel='stylesheet' type='text/css' href='./apps/assets/style/post_it_message.css'>

<?php
while ($post_it = $liste_post->fetch(PDO::FETCH_ASSOC)) {
    // Switch des images pour <input> et <img>
    if ($post_it['statut_post'] == 0) {
        $img_src_p_it = '';
        $img_src_ico = './apps/assets/img/verifier.png';
    } elseif ($post_it['statut_post'] == 1) {
        $img_src_p_it = './apps/assets/img/verifier.png';
        $img_src_ico = './apps/assets/img/annuler.png';
    } elseif ($post_it['statut_post'] == 2) {
        $img_src_p_it = './apps/assets/img/annuler.png';
        $img_src_ico = './apps/assets/img/post_it.png';
    };
?>
    <section class="p_it_message">
        <!-- Statut du post-it -->
        <img class="p_it_img_etat" src='<?php echo $img_src_p_it; ?>'>
        <!-- btn options des post-it 'message' -->
        <div class="p_it_div_all">
            <input class="p_it_btn_valeur" type="button" value="⭕">
            <div class="p_it_div_btn">
                <a href="./index.php?action=statut&id=<?php echo $post_it['id_post'] . '&statut=' . $post_it['statut_post']; ?>">
                    <input class="p_it_btn_action" type="image" src="<?php echo $img_src_ico ?>">
                </a>
                <input class="p_it_btn_action p_it_btn_edit" type="image" src="./apps/assets/img/editer.png">
                <a href="./index.php?action=supp&id=<?php echo $post_it['id_post']; ?>">
                    <input class="p_it_btn_action" type="image" src="./apps/assets/img/delete.png">
                </a>
            </div>
        </div>

        <!-- 
            Nous utilisons un script JS pour switcher entre les deux div suivantes
            La div class="p_it_formulaire" contient le formulaire d'édition pré remplie
            La 2e div contient l'affichage du titre du message et la date de création du post-it
        -->

        <div class="p_it_formulaire p_it_mess_edit">
            <link rel='stylesheet' type='text/css' href='./apps/assets/style/post_it_formulaire.css'>
            <form method='post' action="./index.php?action=edit&id=<?php echo $post_it['id_post']; ?>" enctype='multipart/form-data'>
                <input type='text' class="p_it_form titre_post" name='titre_post' value="<?php echo $post_it['titre_post']; ?>">
                <textarea type='text' class="p_it_form message_post" name='message_post'><?php echo $post_it['message_post']; ?></textarea>
                <input type='submit' class="p_it_form btn_valider" name='valider' value='Éditer'>
            </form>
        </div>

        <div class="p_it_mess_affichage">
            <h2><?php echo $post_it['titre_post']; ?></h2>
            <p class="p_it_p"><?php echo $post_it['message_post']; ?></p>
            <p class="p_it_p date_post_fr"><?php echo $post_it['date_post_fr']; ?></p>
        </div>
        <!-- <script src="#"></script> -->
    </section>
<?php
};
?>
