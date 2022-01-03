<header>
    <div class="left">
        <a href="./users/login.php"><?= $GLOBALS['language']['login'] ?></a>
        <a href="./users/register.php"><?= $GLOBALS['language']['register'] ?></a>
    </div>
    <div class="center">
        <h2><a href="./index.php"><?= $GLOBALS['language']['title'] ?></a></h2>
    </div>
    <div class="right">
        <a href="./users/register.php"><?= $GLOBALS['language']['theme'] ?></a>
        <ul>
            <li><a href="#"><?= $GLOBALS['language']['language'] ?></a>
                <ul>
                    <?php
                    foreach($AllLanguages as $key => $value) {
                        echo '<li><a href="#">'.$key.'</a></li>';
                        $_SESSION['SelectedLanguage'] = $value;
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</header>