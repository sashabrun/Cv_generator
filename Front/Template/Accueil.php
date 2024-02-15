<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Inclusion du fichier de style CSS -->
    <link rel="stylesheet" href="../Css/Accueil.css">
    <!-- Définition de l'encodage du document -->
    <meta charset="UTF-8">
    <!-- Titre de la page -->
    <title>Accueil</title>
</head>
<body>

<?php
// Démarrage de la session PHP
session_start();

// Vérification si l'utilisateur est connecté
if (isset($_SESSION['password'])) {
    ?>
    <!-- Section visible uniquement si l'utilisateur est connecté -->
    <div class="header">
        <!-- Bouton de déconnexion lié au fichier de déconnexion -->
        <a href="../../public/deconnexion.php" class="logout-button">Déconnexion</a>
    </div>
    <div class="container">
        <h1>Bienvenue sur la page D'Accueil !</h1>

        <!-- Bouton redirigeant vers la page de création de CV -->
        <a href="InfoCV.php">
            <input type="button" value="Creation de CV">
        </a>

        <!-- Bouton redirigeant vers la page d'informations -->
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
    <!-- Section visible uniquement si l'utilisateur n'est pas connecté -->
    <div class="container">
        <h1>Veuillez vous connecter</h1>
        <!-- Bouton redirigeant vers la page de connexion -->
        <a href="Connexion.html">
            <input type="button" value="Connexion">
        </a>
    </div>
    <?php
}
?>
</body>
</html>
