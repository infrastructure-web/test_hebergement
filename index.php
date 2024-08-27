<?php 
    include_once "include/config.php";
    $mysqli = new mysqli($host, $username, $password, $database);

    // Ajouter pour assurer la compatibilité de l'encodage de caractères
    $mysqli->set_charset("utf8mb4");

    // Vérifier la connexion
    if ($mysqli -> connect_errno) {
        echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
        exit();
    } else  {
        echo "Connexion réussie!!";
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/produits.js"></script>
</head>
<body>
    <h1>Accueil</h1>

    <h2>Affichage des produits en format "textuel"</h2>
    <?php
        $res = $mysqli->query("SELECT nom, prix_vente, qte_stock FROM produits ORDER BY nom;");
        while ($row = $res->fetch_assoc()) {
            echo  "<p>" . $row["nom"] . " : " . $row["prix_vente"] . "$, " . $row["qte_stock"] . " items(s) en stock<p>";
        }

        $mysqli->close(); // Fermeture de la connexion
    ?>

</body>
</html>