<?php
require('./config.php');
require('./model/Pendu.php');
$word = new Pendu();

if(isset($_POST['play'])) {
    if(isset($_POST['difficulty'])) {
        $_SESSION['difficulty'] = $_POST['difficulty'];
    } else {
        $_SESSION['difficulty'] = 0;
    }
    $word->generate_word($_SESSION['difficulty']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - LePendu.io</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php require('./src/header.php') ?>
    <main>
        <div class="contener">
            <div class="box">
                <h2><?= $language['title'] ?></h2>
                <h3><?= $language['subtitle'] ?></h3>
            </div>
            <form class="gamePendu" action="" method="post">
                <input type="submit" class="btn blue" name="play" value="<?= $language['play'] ?>">
                <h3>Choissisez votre difficulté</h3>
                <div class="box">
                    <select name="difficulty" class="btn blue">
                        <option value="0">Aucune difficulté</option>
                        <option value="1">Facile</option>
                        <option value="2">Moyen</option>
                        <option value="3">Difficile</option>
                    </select>
                </div>
            </form>
        </div>
    </main>
    <?php require('./src/footer.php') ?>
</body>
</html>