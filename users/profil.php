<?php
require('../model/Users.php');
$user = new User();
if(isset($_POST['edit'])) {
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
        $user->update($_POST['login'], $_POST['password'], $_POST['password2']);
    }
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
    <title>Profil - LePendu.io</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php require('../src/header.php') ?>
    <main>
        <?php if (isset($_POST['edit'])) {
            $user->alerts();
        } ?>
        <div class="contener">
            <svg id="profil-svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#0099FF" d="M63.9,-38C77.1,-13.9,78.3,16,65.7,39.4C53,62.9,26.5,79.9,0.3,79.7C-25.9,79.6,-51.8,62.2,-64.5,38.7C-77.3,15.2,-76.8,-14.4,-63.8,-38.3C-50.9,-62.1,-25.4,-80.2,-0.1,-80.1C25.3,-80.1,50.6,-62,63.9,-38Z" transform="translate(100 100)" />
            </svg>
            <form method="post" class="registration" id="profil-form" action="">
                <label>Nom d'utilisateur</label>
                <input type="text" class="text-input" name="login" placeholder="Nom d'utilisateur" value="<?= $_SESSION['login'] ?>">
                <label>Mot de passe</label>
                <input type="password" class="text-input" name="password" placeholder="Mot de passe" value="">
                <label>Confirmation du Mot de passe</label>
                <input type="password" class="text-input" name="password2" placeholder="Confirmer le mot de passe" value="">
                <input type="submit" class="btn green" name="edit" value="Modifier mon profil">
                <input type="submit" class="btn red" name="disconnect" value="Se déconnecter">
            </form>
        </div>
    </main>

    <?php require('../src/footer.php') ?>
</body>
</html>