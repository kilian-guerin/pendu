<?php
require('config.php');
require('src/class-pendu.php');

$pendu = new Pendu();
$pendu->verifyWord();

var_dump($pendu->getWord());

if(isset($_POST['retry'])) {
    $pendu->generateWord();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Game - LePendu.io</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php require('./src/header.php') ?>
    <main>
        <?php if ($_SESSION['nbTentatives'] == -1) { ?>
            <div class="top">
                <h1>LE JEU DU PENDU</h1>
            </div>
            <div class="contener">
                <img src="./assets/img/pendu-6.png" alt="">
                <h2><?= $language['win-title'] ?></h2><br>
                <h3><?= $language['win'] ?></h3>
                <form class="gamePendu" action="" method="post">
                    <input type="submit" class="btn green" href="index.php" name="retry" value="<?= $language['play'] ?>">
                    <a class="btn red" href="index.php"><?= $language['leave'] ?></a>
                </form>
            </div>
        <?php } else if($_SESSION['nbTentatives'] < 6) { ?>
                <div class="top">
                    <h1><?= $GLOBALS['language']['title'] ?></h1>
                    <h4><?= $GLOBALS['language']['subtitle'] ?></h4>
                </div>
                <div class="contener">
                <img src="./assets/img/pendu-<?= $_SESSION['nbTentatives'] ?>.png" alt="">
                    <form class="gamePendu" action="" method="post">
                        <div class="box">
                        <h3 id="hide-word"><?php
                        $pendu->getHiddenWord();
                        ?></h3>
                        <?php
                        $pendu->getAlphabet();
                        ?>
                        </div>
                    <form>
                </div>
        <?php } else { ?>
            <div class="top">
                <h1>LE JEU DU PENDU</h1>
            </div>
            <div class="contener">
                <img src="./assets/img/pendu-6.png" alt="">
                <h2><?= $language['lose-title'] ?></h2><br>
                <h3><?= $language['lose'] . $pendu->getWord(); ?></h3>
                <form class="gamePendu" action="" method="post">
                    <input type="submit" class="btn green" href="index.php" name="retry" value="<?= $language['retry'] ?>">
                    <a class="btn red" href="index.php"><?= $language['leave'] ?></a>
                </form>
            </div>
        <?php } ?>
    </main>
</body>
</html>