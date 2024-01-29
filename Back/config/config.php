<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "cv generator";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion à la base de données réussie";
} catch (PDOException $erreur) {
    echo "Erreur de connexion à la base de données : " . $erreur->getMessage();
}
?>
