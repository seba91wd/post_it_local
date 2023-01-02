import { log } from './fonction/log.js';
import { random_bg } from './fonction/random_bg.js';
import { random_rotate } from './fonction/random_rotate.js';

let section = document.querySelectorAll('section');
let p_it_btn_valeur = document.querySelectorAll('.p_it_btn_valeur');
let p_it_form = document.querySelectorAll('.p_it_form');

// ------------------------------------------------------------------------------------
// Cette boucle applique deux effets de style sur toutes les <section>.
// 1 - backgroundColor aléatoire.
// 2 - Inclinaison aléatoire des post-it au chargement de la page et au passage de la souris.
// ------------------------------------------------------------------------------------

for(let i = 0; i < section.length; i++){
    // ---------- 1 ----------
    if(section[i].className == 'p_it_formulaire'){
        let bg_color = random_bg();
        // backgroundColor sur la section
        section[i].style.backgroundColor = bg_color;
        for(let j = 0; j < p_it_form.length; j++){
            p_it_form[j].style.backgroundColor = bg_color;
        }
    }

    // backgroundColor aléatoire sur le reste des post-it
    else{
        let bg_color = random_bg();
        section[i].style.backgroundColor = bg_color;
        let section_input = section[i].querySelectorAll('input');
        // log(section_input);
        for(let j = 0; j < section_input.length; j++){
            section_input[j].style.backgroundColor = bg_color;
        }
    }

    // ---------- 2 ----------

    // Inclinaison aléatoire des post-it
    section[i].style.rotate = random_rotate();

    // Inclinaison aléatoire des post-it au passage de la sourit
    if(section[i].addEventListener('mouseover', function () {
        section[i].style.rotate = random_rotate();
    }));
}

// ------------------------------------------------------------------------------------
// Animation des boutons
// ------------------------------------------------------------------------------------

// Animation de la div contenant les boutons 'action'
for(let i = 0; i < p_it_btn_valeur.length; i++){
    p_it_btn_valeur[i].addEventListener('click', (e) => {
        let div_parent = e.target.parentNode;
        let div_btn = e.target.parentNode.children[1];
        let interval = 500;
        if(div_parent.style.width != '92%'){
            div_parent.style.width = '92%';
            setTimeout(() =>{
                div_btn.style.display = "flex";
                div_btn.style.opacity = "0";
                div_btn.style.transition = "0.5s";
            },interval);
            setTimeout(() =>{
                div_btn.style.opacity = "1";
            },interval + 10);
        }
        else{
            div_btn.style.opacity = "0";
            setTimeout(() =>{
                div_btn.style.display = "none";
                div_parent.style.width = '18px';
            },interval);
        };
    });
};

// ------------------------------------------------------------------------------------
// Choix du fond d'écran
// ------------------------------------------------------------------------------------

let fond_ecran = document.querySelectorAll('.p_it_img');
let body = document.querySelector('body');
for (let i = 0; i < fond_ecran.length; i++){
    if(fond_ecran[i].addEventListener('click', function () {
        // log(this);
        body.style.background = 'url(' + this.src + ')';
    }));
};

// ------------------------------------------------------------------------------------
// Modification de l'icône des boutons 'action'
// Affichage de l'image valider / annuler sur les post-it
// ------------------------------------------------------------------------------------

let btn_alterne = document.querySelectorAll('.p_it_btn_action');
for(let i = 0; i < btn_alterne.length; i++){
    btn_alterne[i].addEventListener('click',() => {
        // renvoi à la balise <img class="p_it_img_etat" src="">
        let p_it_img_etat = btn_alterne[i].parentElement.parentElement.parentElement.firstElementChild;

        // btn : ❌ || ⭕
        if(btn_alterne[i].className == 'p_it_btn_action btn_alterne_true'){
            btn_alterne[i].className = 'p_it_btn_action btn_alterne_false';
            btn_alterne[i].value = '❌';
        }
        else if(btn_alterne[i].className == 'p_it_btn_action btn_alterne_false'){
            btn_alterne[i].className = 'p_it_btn_action btn_alterne_true';
            btn_alterne[i].value = '⭕';
        }
    });
};

// ------------------------------------------------------------------------------------
// Act/Dés Le chat
// ------------------------------------------------------------------------------------

let oneko = document.querySelector('#oneko');
let btn_chat = document.getElementById('btn_chat');
// Passez la variable chat sur 'false' pour désactiver par défaut.
let chat = true;
btn_chat.addEventListener('click', function(){
    if(chat == true){
        // log('chat = false');
        oneko.style.display = 'none';
        chat = false;
    }
    else{
        // log('chat = true');
        oneko.style.display = 'block';
        chat = true;
    };
});


// ------------------------------------------------------------------------------------
// Switch message / formulaire d'edition
// ------------------------------------------------------------------------------------

let p_it_btn_edit = document.querySelectorAll('.p_it_btn_edit');

let p_it_mess_edit = document.querySelectorAll('.p_it_mess_edit')
let p_it_mess_affichage = document.querySelectorAll('.p_it_mess_affichage')

for(let i = 0; i < p_it_btn_edit.length; i++){

    p_it_btn_edit[i].addEventListener('click', function(){
        // log(p_it_btn_edit[i])
        if (p_it_mess_affichage[i].style.display != 'none') {
            p_it_mess_affichage[i].style.display = 'none';
            p_it_mess_edit[i].style.display = 'block';
        }
        else{
            p_it_mess_affichage[i].style.display = 'block';
            p_it_mess_edit[i].style.display = 'none';
        };
    });
};