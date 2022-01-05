<?php
require('../model/class-users.php');
$user = new User();
if(isset($_POST['edit'])) {
    $user->update($_POST['login'], $_POST['password'], $_POST['password2']);
} else if (isset($_POST['disconnect'])) {
    $user->disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php require('../src/header.php') ?>
    <main>
        <?php if (isset($_POST['edit'])) {
            $user->alerts();
        } ?>
        <div class="contener center">
            <form method="post" class="registration" action="">
                <input type="text" class="text-input" name="login" placeholder="Nom d'utilisateur" value="<?= $_SESSION['login'] ?>">
                <input type="password" class="text-input" name="password" placeholder="Mot de passe" value="<?= $_SESSION['password'] ?>">
                <input type="password" class="text-input" name="password2" placeholder="Mot de passe" value="<?= $_SESSION['password'] ?>">
                <input type="submit" class="btn green" name="edit" value="Modifier mon profil">
                <input type="submit" class="btn red" name="disconnect" value="Se déconnecter">
            </form>
        </div>
    </main>

    <?php require('../src/footer.php') ?>
</body>
</html>