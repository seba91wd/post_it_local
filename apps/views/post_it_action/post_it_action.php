<?php
include './apps/controllers/post_it_action/post_it_action.php'
?>
<section id="p_it_action">
    <link rel='stylesheet' type='text/css' href='./apps/assets/style/post_it_action.css'>
    <!-- Supprimer les post-it -->
    <div class="p_it_div_all">
        <input class="p_it_btn_valeur" type="button" value="⭕">
        <div class="p_it_div_btn">
            <a href='#'>
                <input class="p_it_btn_action" type="image" src="./apps/assets/img/delete.png">
            </a>
        </div>
    </div>
    <h2>Post-it action</h2>
    <ul>
    <?php while ($liste_action = $bdd_actions->fetch(PDO::FETCH_ASSOC)){ ?>
        <li><?php echo $liste_action['text_action'] ?></li>
    <?php } ?>
    </ul>
</section>