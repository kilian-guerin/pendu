<?php
require('../model/class-rankings.php');
require('../model/class-pendu.php');
$word = new Pendu();

if(isset($_POST['addWord'])) {
    $word->addWord($_POST['addWord']);
} else if (isset($_POST['editWord'])) {
    $word->editWord($_POST['editWord']);
} else if (isset($_POST['deleteWord'])) {
    $word->deleteWord($_POST['deleteWord']);
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
        <?php if (isset($_POST['addWord']) && isset($_POST['editWord']) && isset($_POST['deleteWord'])) {
            $word->alerts();
        } ?>
        <div class="contener center">
            <form class="gamePendu center" method="post">
                <input type="text" class="btn blue" id="add-word" name="addWord" placeholder="<?= $language['addWord'] ?>">
            </form>
            <div class="sub-box">
            <?php
            foreach ($word->getAllWord() as $key) {
                echo '
                <div class="box">
                    <div class="left">
                        <h3>'.$key.'</h3>
                    </div>
                    <form class="right" method="post">
                        <input type="submit" class="btn orange size" name="editWord" value="'.$language['edit'].'">
                        <br>
                        <input type="submit" class="btn red size" name="deleteWord" value="'.$language['delete'].'">
                        <input type="hidden" class="btn red size" name="deleteWord" value="'.$key.'">
                    </form>
                </div>';
            }
            ?>
            </div>
        </div>
    </main>
    <?php require('../src/footer.php') ?>
</body>
</html>