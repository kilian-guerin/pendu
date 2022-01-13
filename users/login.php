<?php
require('../model/Users.php');
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
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#0099FF" d="M63.9,-38C77.1,-13.9,78.3,16,65.7,39.4C53,62.9,26.5,79.9,0.3,79.7C-25.9,79.6,-51.8,62.2,-64.5,38.7C-77.3,15.2,-76.8,-14.4,-63.8,-38.3C-50.9,-62.1,-25.4,-80.2,-0.1,-80.1C25.3,-80.1,50.6,-62,63.9,-38Z" transform="translate(100 100)" />
            </svg>
            <form method="post" class="registration" action="">
                <label>Nom d'utilisateur</label>
                <input type="text" class="text-input" name="login" placeholder="Nom d'utilisateur">
                <label>Mot de passe</label>
                <input type="password" class="text-input" name="password" placeholder="Mot de passe">
                <input type="submit" class="btn green" name="connect" value="Connexion">
            </form>
        </div>
    </main>

    <?php require('../src/footer.php') ?>
</body>
</html>