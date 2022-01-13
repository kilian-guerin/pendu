<?php
require('../model/Rankings.php');
require('../model/Pendu.php');
$word = new Pendu();
$edit = 0;

if($_SESSION['perms'] < 2) {
    header('location: ../index.php');
}

if(isset($_POST['addWord'])) {
    $word->add_word($_POST['addWord']);
} else if (isset($_POST['deleteWord'])) {
    $word->delete_word($_POST['deleteWord']);
} else if (isset($_POST['confirmEdit'])) {
    $word->edit_word($_GET['word'], $_POST['wordEdit']);
    var_dump($_GET['word'] . ' - ' . $_POST['wordEdit']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - LePendu.io</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php require('../src/header.php') ?>
    <main>
        <?php if (isset($_POST['addWord']) || isset($_POST['deleteWord'])) {
            $word->alerts();
        } ?>
        <div class="contener center">
            <form class="gamePendu center" method="post">
                <?php 
                echo '<input type="text" class="btn blue" id="add-word" name="addWord" placeholder="'.$language['addWord'].'">';    
                ?>
            </form>
            <div class="sub-box">
            <?php
            foreach ($word->get_all_word() as $key) {
                echo '
                <div class="box">
                    <div class="left">
                        <h3>'.$key.'</h3>
                    </div>
                    <form class="right" method="post">
                        <a class="btn orange size" href="?word='.$key.'#edit">'.$language['edit'].'</a>
                        <br>
                        <input type="submit" class="btn red size" name="deleteWord" value="'.$language['delete'].'">
                        <input type="hidden" class="btn red size" name="deleteWord" value="'.$key.'">
                    </form>
                </div>';
            }
            ?>
            </div>
        </div>
        <div id="edit" class="overlay">
            <div class="popup">
                <div class="content">
                    <form class="popup" method="post">
                        <h2>Modification d'un mot</h2>
                        <div>
                            <input type="text" class="btn blue" name="wordEdit" value="<?= $_GET['word'] ?>">
                            <input type="submit" class="btn green" name="confirmEdit" value="<?= $language['edit'] ?>">
                            <a class="btn red" href="#"><?= $language['cancel'] ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require('../src/footer.php') ?>
</body>
</html>