<?php

require('../config.php');

class Ranking {
    public function getRankings() {
        $req = $GLOBALS['bdd']->query("SELECT score, id_utilisateur, users.login FROM commentaires INNER JOIN users on classement.id_utilisateur = classement.id ORDER BY score ASC");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($res as $key) {
            echo '<div>';
                echo '<h2 style="color: black; font-size: 125%">' . $key["users.login"] . ' - ' . $key["date"] . '</h2>';
                echo '<h2 style="color: black;">' . $key["commentaire"] . '</h2>';
            echo '</div>';
        }
    }
}

?>