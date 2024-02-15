<?php
include "../config/config.php";
include "../public/user.php";

// Vérification de la méthode de requête
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["Nomutilisateur"];
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatpassword"];
    $numeroTelephone = $_POST["numeroTelephone"];

    // Vérification si les mots de passe correspondent
    if ($password == $repeatPassword) {
        // Appel de la fonction pour ajouter l'utilisateur
        addUser($pseudo, $nom, $prenom, $password, $email, $numeroTelephone);

        // Redirection après l'inscription réussie
        header("Location: ../../Front/Template/Connexion.html");
        exit();
    } else {
        // Affichage d'un message d'erreur si les mots de passe ne correspondent pas
        echo "Les mots de passe ne correspondent pas.";
    }
}
?>
