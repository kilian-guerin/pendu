<?php
    $bdd = new PDO('mysql:host=localhost;dbname=pendu','root','');
    session_start();

    $language = [
        'title' => 'LE JEU DU PENDU',
        'subtitle' => 'Tentez de deviner le mot secret en entrant des lettres une par une qui sont afficher sur la page. Ne gaspillez pas vos coups, car si trop de vos choix sont erronés vous tuerez le pendu et vous perdrez la partie.',

        'register' => 'Inscription',
        'login' => 'Connexion',
        'profil' => 'Profil',
        'admin' => 'Admin',
        'ranking' => 'Classements',
    
        'addWord' => 'Écrivez un mot',
        'edit' => 'Modifier',
        'delete' => 'Supprimer',

        'win-title' => 'VOUS AVEZ GAGNÉ !',
        'win' => 'Félicitation, vous avez gagné la partie, le mot était : ',
        'lose-title' => 'VOUS AVEZ PERDU !',
        'lose' => 'Vous avez perdu le mot était : ',

        'play' => 'Jouer',
        'retry' => 'Réessayer',
        'leave' => 'Quitter',
    ];
?>