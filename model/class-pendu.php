<?php

class Pendu {

    private $_Malert;
    private $_Talert;

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }
    
    public function generateWord($difficulty = 0) {
        $word = $this->getList($difficulty);
        
        for($i = 0 ; isset($word[$i]) ; $i++) {
            $wordHidden[] = '_';
        }
        
        $_SESSION['Word'] = $word;
        $_SESSION['HiddenWord'] = $wordHidden;
        $_SESSION['Words'] = null;
        $_SESSION['nbTentatives'] = 0;

        header('location: ./game.php');
    }

    public function verifyWord() {
        if(isset($_GET['word'])) {
            $_SESSION['Words'].=$_GET['word'];
            $this->ErrorLetter();
            for($i=0; isset($_SESSION['Word'][$i]) ; $i++) {
                if ($_SESSION['Word'][$i] == $_GET['word']) {
                    $_SESSION['HiddenWord'][$i] = $_GET['word'];
                    
                    if ( implode($_SESSION['HiddenWord']) == $_SESSION['Word']) {
                        $_SESSION['nbTentatives'] = -1;
                    }
                }
            }
        }
    }

    public function ErrorLetter() {
        if( !strpos( $_SESSION['Word'], $_GET['word'] ) ) {
            if( $_SESSION['Word'][0] != $_GET['word'] ) {
                $_SESSION['nbTentatives']++;
            }
        }
    }

    public function addWord($word) {
        $file = file("../mots.txt");
        $cut = explode(" ", $file[0]);

        if(!strpos($cut, $word)) { // Refaire la condition que si il y a le mot $word dans la liste alors on annule l'ajout du mot
            $words = file_get_contents("../mots.txt");
            $words .= ' ' . $word;
            file_put_contents("../mots.txt", $words);

            $this->_Malert = 'Votre mot à bien été ajouter.';
            $this->_Talert = 1;

            header('refresh:3');
        } else {
            $this->_Malert = 'Le mot que vous souhaiter ajouer est déjà dans la liste.';
            $this->_Talert = 2;

            header('refresh:2');
        }
    }

    public function getAlphabet() {
        // Met toute les lettre jouable dans une variable.
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        for($i=0;$i<strlen($alphabet);$i++) {
            if ( strpos( $_SESSION['Words'], substr($alphabet,$i,1) ) === false) {
                echo "<a class='btn blue' href='game.php?word=".substr($alphabet,$i,1)."'>".substr($alphabet,$i,1)."</a> ";
            } else {
                echo "<a class='btn red'>".substr($alphabet,$i,1)."</a> ";
            }
        }
    }

    public function getWord() {
        return $_SESSION['Word'];
    }

    public function getAllWord() {
        $file = file("../mots.txt");
        $cut = explode(" ", $file[0]);

        return $cut;
    }

    public function getList($difficulty) {
        $file = file("mots.txt");
        $cut = explode(" ", $file[0]);
        $rand = rand(0, count($cut));

        for($i=0;$i<count($cut);$i++) {
            if( $difficulty == 1 ) {
                if(strlen($cut[$rand]) <= 6) {
                    $word = $cut[$rand];
                    return $word;
                } else {
                    $rand = rand(0, count($cut));
                }
            } elseif ( $difficulty == 2 ) {
                if(strlen($cut[$rand]) > 6 && strlen($cut[$rand]) < 10 ) {
                    $word = $cut[$rand];
                    return $word;
                } else {
                    $rand = rand(0, count($cut));
                }
            } elseif ( $difficulty == 3 ) {
                if(strlen($cut[$rand]) >= 8 ) {
                    $word = $cut[$rand];
                    return $word;
                } else {
                    $rand = rand(0, count($cut));
                }
            } elseif ( $difficulty == 0 ) {
                $word = $cut[$rand];
                return $word;
            }
        }
    }

    public function getHiddenWord() {
        for($i=0;$i<count($_SESSION['HiddenWord']);$i++)
        {
            echo $_SESSION['HiddenWord'][$i];
        }
    }
}

?>