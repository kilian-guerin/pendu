<?php
require('../model/class-users.php');
$user = new User();
if(isset($_POST['connect'])) {
    $user->login($_POST['login'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - LePendu.io</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php require('../src/header.php') ?>
    <main>
        <?php if (isset($_POST['connect'])) {
            $user->alerts();
        } ?>
        <div class="contener center">
            <form method="post" class="registration" action="">
                <input type="text" class="text-input" name="login" placeholder="Nom d'utilisateur">
                <input type="password" class="text-input" name="password" placeholder="Mot de passe">
                <input type="submit" class="btn green" name="connect" value="Connexion">
            </form>
        </div>
    </main>

    <?php require('../src/footer.php') ?>
</body>
</html>