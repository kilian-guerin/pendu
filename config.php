<?php
    $host = 'localhost';
    $db   = 'pendu';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $bdd = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    
    session_start();

    $language = [
        'title' => 'LE JEU DU PENDU',
        'subtitle' => 'Tentez de deviner le mot secret en entrant des lettres une par une qui sont afficher sur la page. Ne gaspillez pas vos coups, car si trop de vos choix sont erronés vous tuerez le pendu et vous perdrez la partie.',

        'register' => 'Inscription',
        'login' => 'Connexion',
        'disco' => 'Déconnexion',
        'profil' => 'Profil',
        'admin' => 'Admin',
        'ranking' => 'Classements',
    
        'addWord' => 'Écrivez un mot',
        'edit' => 'Modifier',
        'cancel' => 'Annuler',
        'delete' => 'Supprimer',

        'win-title' => 'VOUS AVEZ GAGNÉ !',
        'win' => 'Félicitation, vous avez gagné la partie, le mot était : ',
        'win2' => ', votre temps est de ',
        'lose-title' => 'VOUS AVEZ PERDU !',
        'lose' => 'Vous avez perdu le mot était : ',

        'play' => 'Jouer',
        'retry' => 'Réessayer',
        'leave' => 'Quitter',
    ];
?>