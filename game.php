<?php
require('config.php');
require('model/Pendu.php');

$pendu = new Pendu();
$pendu->verify_word();

if (isset($_POST['retry'])) {
    $pendu->generate_word();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En Jeu - LePendu.io</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php require('./src/header.php') ?>
    <main>
        <?php if ($_SESSION['win']) { ?>
            <div class="contener center">
                <img src="./assets/img/pendu-6.png" alt="">
                <h2><?= $language['win-title'] ?></h2><br>
                <h3><?= $language['win'] . $pendu->get_word() . $language['win2'] . $pendu->get_score() ?></h3><br>
                <form class="gamePendu" action="" method="post">
                    <input type="submit" class="btn green" href="index.php" name="retry" value="<?= $language['play'] ?>">
                    <a class="btn red" href="index.php"><?= $language['leave'] ?></a>
                </form>
            </div>
        <?php } else if ($_SESSION['nbTentatives'] < 6) { ?>
            <div class="contener">
                <img src="./assets/img/pendu-<?= $_SESSION['nbTentatives'] ?>.png" alt="">
                <form class="gamePendu" action="" method="get">
                    <div class="box">
                        <h3 id="hide-word"><?php $pendu->get_hidden_word() ?></h3>
                        <?php $pendu->get_alphabet(); ?>
                    </div>
                <form>
            </div>
        <?php } else { ?>
            <div class="top">
                <h1>LE JEU DU PENDU</h1>
            </div>
            <div class="contener center">
                <img src="./assets/img/pendu-6.png" alt="">
                <h2><?= $language['lose-title'] ?></h2><br>
                <h3><?= $language['lose'] . $pendu->get_word(); ?></h3>
                <form class="gamePendu" action="" method="post">
                    <input type="submit" class="btn green" href="index.php" name="retry" value="<?= $language['retry'] ?>">
                    <a class="btn red" href="index.php"><?= $language['leave'] ?></a>
                </form>
            </div>
        <?php } ?>
    </main>
    <?php require('./src/footer.php') ?>
</body>

</html>