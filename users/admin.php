<?php
require('../model/class-rankings.php');
require('../model/class-pendu.php');
$word = new Pendu();

if(isset($_POST['addWord'])) {
    $word->addWord($_POST['addWord']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - LePendu.io</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php require('../src/header.php') ?>
    <main>
        <?php if (isset($_POST['addWord'])) {
            $word->alerts();
        } ?>
        <div class="contener center">
            <form class="gamePendu center" action="" method="post">
                <input type="text" class="btn blue" name="addWord" placeholder="<?= $language['addWord'] ?>">
            </form>
            <div class="sub-box">
            <?php
            foreach ($word->getAllWord() as $key) {
                echo '
                <div class="box">
                    <div class="left">
                        <h3>'.$key.'</h3>
                    </div>
                    <div class="right">
                        <input type="submit" class="btn orange size" name="edit" value="'.$language['edit'].'">
                        <br>
                        <input type="submit" class="btn red size" name="delete" value="'.$language['delete'].'">
                    </div>
                </div>';
            }
            ?>
            </div>
        </div>
    </main>
    <?php require('../src/footer.php') ?>
</body>
</html>