<?php

require('../config.php');

class Ranking  {


    public function getRankings() {
        $req = new $GLOBALS['bdd']->query("SELECT `classement`.`id`, score, id_utilisateur FROM classement INNER JOIN users ON `classement`.`id_utilisateur` = `users`.`id` ORDER BY ASC");
        $res = $req->fetchAll();

        foreach ($res as $key) {
            echo $key['classement.id'] . ' - ' . $key['score'];
        }
    }
}

?>