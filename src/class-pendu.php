<?php

class Pendu {
    
    public function generateWord() {
        
        $file = file("mots.txt");
        $cut = explode(" ", $file[0]);
        $rand = rand(0, count($cut)); 
        $word = $cut[$rand];

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

    public function getHiddenWord() {
        for($i=0;$i<count($_SESSION['HiddenWord']);$i++)
        {
            echo $_SESSION['HiddenWord'][$i];
        }
    }
}

?>