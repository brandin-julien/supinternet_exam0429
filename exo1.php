<?php
session_start();

//initialisation du jeu et/ou reset en cas de partie fini
if(!isset($_SESSION['nbAllumette'])){
    $_SESSION['nbAllumette'] = 13;
    echo($_SESSION['winer']);
    unset($_SESSION['winer']);
}

//liste des allumettes
$tab = array(
    1 => '<input type="checkbox" name="allumette1" value="1">',
    2 => '<input type="checkbox" name="allumette2" value="2">',
    3 => '<input type="checkbox" name="allumette3" value="3">',
    4 => '<input type="checkbox" name="allumette4" value="4">',
    5 => '<input type="checkbox" name="allumette5" value="5">',
    6 => '<input type="checkbox" name="allumette6" value="6">',
    7 => '<input type="checkbox" name="allumette7" value="7">',
    8 => '<input type="checkbox" name="allumette8" value="8">',
    9 => '<input type="checkbox" name="allumette9" value="9">',
    10 => '<input type="checkbox" name="allumette10" value="10">',
    11 => '<input type="checkbox" name="allumette11" value="11">',
    12 => '<input type="checkbox" name="allumette12" value="12">',
    13 => '<input type="checkbox" name="allumette13" value="13">',
);

afficheAllumette($tab);
game();

//coeur du jeu
function game(){
    if ($_POST) {
        if (sizeof($_POST) < 1 || sizeof($_POST) > 3) {
            echo "Erreur: Il faut choisir entre 1 et 3 allumettes";
        }else{
            //tour du joueur
            $_SESSION['nbAllumette'] = $_SESSION['nbAllumette'] - sizeof($_POST);
            //verification si la partie esr fini
            if($_SESSION['nbAllumette'] <= 0){
                return gameFinish("L'ordinateur ");
            }
            //tour de l'ordinateur
            $ordiTurn = rand(1, 3);
            //verification si la partie esr fini
            $_SESSION['nbAllumette'] = $_SESSION['nbAllumette'] - $ordiTurn;
            if($_SESSION['nbAllumette'] <= 0){
                return gameFinish("Le joueur ");
            }
        }
    }
}

// permet de d'afficher le vainqeur et d'arreter la partie
function gameFinish($player){
    $_SESSION['winer'] = "Partie fini:". $player ."gange la partie!";
    unset($_SESSION['nbAllumette']);
}


//affiche les allumettes restantes
function afficheAllumette($tab){
    $i = 1;
    echo('<form method="post">');
    while($i <= $_SESSION['nbAllumette']){
        echo($tab[$i]);
        $i++;
    }
    echo('<br><input type="submit" value="Tirer"></form>');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nim</title>
</head>
<body>

</body>
</html>
