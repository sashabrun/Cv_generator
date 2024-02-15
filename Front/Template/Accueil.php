<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/Accueil.css">
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['password'])) {
    ?>

    <div class="header">
        <a href="../../public/deconnexion.php" class="logout-button">Déconnexion</a>
    </div>
    <div class="container">
        <h1>Bienvenue sur la page D'Accueil !</h1>

        <a href="InfoCV.php">
            <input type="button" value="Creation de CV">
        </a>

        <a href="Infos.php">
            <input type="button" value="Page d'Information">
        </a>
    </div>

    <div class="container2">
        <h1>Existing CVs</h1>
    </div>

    <?php
} else {
    ?>

    <div class="container">
        <h1>Veuillez vous connecter</h1>
        <a href="Connexion.html">
            <input type="button" value="Connexion">
        </a>
    </div>
    <?php
}
?>
</body>
</html>
