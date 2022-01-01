<?php
require('config.php');
require('./src/class-pendu.php');

if(isset($_POST['play'])) {
    $word = new Pendu();
    $word->generateWord();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - LePendu.io</title>
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
                <input type="submit" class="btn blue" name="play" value="Jouer">
            </form>
        </div>
    </main>
    <?php require('./src/footer.php') ?>
</body>
</html>