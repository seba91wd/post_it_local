<section>
    <link rel='stylesheet' type='text/css' href='./apps/assets/style/post_it_option.css'>
    <h2>Post-it Option</h2>
    <!-- Fond d'écran -->
    <div class="p_it_div_all">
        <input class="p_it_btn_valeur p_it_option" type="button" value="Fond d'écran">
        <div class="p_it_div_btn">
            <input class="p_it_btn_action p_it_img" type="image" src="./apps/assets/img/wooden.jpg" alt="wooden">
            <input class="p_it_btn_action p_it_img" type="image" src="./apps/assets/img/window.jpg" alt="window">
        </div>
    </div>

    <!-- Act/Dés Le chat -->
    <div class="p_it_div_all">
        <input class="p_it_btn_valeur p_it_option" type="button" value="Act/Dés Le chat">
        <div class="p_it_div_btn">
            <input class="p_it_btn_action btn_alterne_true" id="btn_chat" type="button" value="⭕">
        </div>
    </div>

    <!-- Supprimer les post-it -->
    <div class="p_it_div_all">
        <input class="p_it_btn_valeur p_it_option" type="button" value="Supprimer les post-it">
        <div class="p_it_div_btn">
            <p style="color: white; margin-top: 3px;">Inactif</p>
            <a href='./index.php?action=supp&id=all'>
                <input class="p_it_btn_action" type="image" src="./apps/assets/img/delete.png" alt="corbeille">
            </a>
        </div>
    </div>
    <?php $msg ?>
</section>