<?php
if(isset($_POST['lang'])) {
    $_SESSION['SelectedLanguage'] = $_POST['lang'];
}
?>

<header>
    <?php if(isset($_SESSION['login'])) { ?>
        <div class="left">
            <a href="/pendu/users/profil.php"><?= $GLOBALS['language']['profil'] ?></a>
            <?php if ($_SESSION['perms'] == 3) { ?>
                <a href="/pendu/users/admin.php"><?= $GLOBALS['language']['admin'] ?></a>
            <?php } ?>
        </div>
        <div class="center">
            <h2><a href="/pendu/index.php"><?= $GLOBALS['language']['title'] ?></a></h2>
        </div>
        <div class="right">
            <a href="/pendu/users/rankings.php"><?= $GLOBALS['language']['ranking'] ?></a>
        </div>
    <?php } else { ?>
        <div class="left">
            <a href="/pendu/users/login.php"><?= $GLOBALS['language']['login'] ?></a>
        </div>
        <div class="center">
            <h2><a href="/pendu/index.php"><?= $GLOBALS['language']['title'] ?></a></h2>
        </div>
        <div class="right">
            <a href="/pendu/users/register.php"><?= $GLOBALS['language']['register'] ?></a>
        </div>
    <?php } ?>
</header>