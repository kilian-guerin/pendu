<?php
    $bdd = new PDO('mysql:host=localhost;dbname=pendu','root','');
    session_start();

    $_SESSION['SelectedLanguage'] = 'en';

    $SelectedLanguage = $_SESSION['SelectedLanguage'];

    if($SelectedLanguage == 'fr') {
        $language = [
            'title' => 'LE JEU DU PENDU',
            'subtitle' => 'Tentez de deviner le mot secret en entrant des lettres une par une qui sont afficher sur la page. Ne gaspillez pas vos coups, car si trop de vos choix sont erronés vous tuerez le pendu et vous perdrez la partie.',

            'register' => 'Inscription',
            'login' => 'Connexion',
            'profil' => 'Profil',
            
            'theme' => 'Thèmes',
            'language' => 'Langues',

            'win-title' => 'VOUS AVEZ GAGNÉ !',
            'win' => 'Félicitation, vous avez gagné la partie.',
            'lose-title' => 'VOUS AVEZ PERDU !',
            'lose' => 'Vous avez perdu le mot était : ',

            'play' => 'Jouer',
            'retry' => 'Réessayer',
            'leave' => 'Quitter',
        ];
    } else {
        $language = [
            'title' => 'THE HANGMAN\'S GAME',
            'subtitle' => 'Try to guess the secret word by entering letters one by one that are displayed on the page. Don\'t waste your moves, because if too many of your choices are wrong you will kill the hanged man and lose the game.',

            'register' => 'Register ',
            'login' => 'Login',
            'profil' => 'Profil',

            'win-title' => 'YOU HAVE WIN !',
            'win' => 'Congratulations, you have won the game.', // 'Congratulations, you have won the game, you can login to appear in the ranking',
            'lose-title' => 'YOU HAVE LOST !',
            'lose' => 'You lost the word was : ',
            
            'theme' => 'Theme',
            'language' => 'Language',

            'play' => 'Play',
            'retry' => 'Retry',
            'leave' => 'Leave',
        ];
    }
?>