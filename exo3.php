<?php

require_once ("./exo3/Maazines.php");

//Création de notre objet
$mazineInformation = new Magazines();

//Récupération des informations
$mazineInformation = $mazineInformation->getInfo($pdo);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporting</title>
</head>
<body>

<?php foreach ($mazineInformation as $mazineInformation): ?>
    <div>
        Titre: <?php echo $mazineInformation["Titre"]; ?><br>
        Date: <?php echo $mazineInformation["Date"]; ?><br>
        Parution : <?php echo $mazineInformation["Parution"]; ?><br>
        Type : <?php echo $mazineInformation["Type"]; ?><br>
        Nombre d'abonnées : <?php echo $mazineInformation["Abonnées"]; ?><br>
    </div> <br>
<?php endforeach; ?>

</body>
</html>
