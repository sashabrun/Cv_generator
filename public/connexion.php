<?php
// Inclusion du fichier de configuration et du fichier d'utilisateur
include "../config/config.php";
include "../public/user.php";

// Démarrage de la session
session_start();

// Connexion à la base de données
global $conn;

// Vérification si le formulaire de connexion a été soumis
if (isset($_POST['submit'])) {
    // Récupération des valeurs du formulaire
    $username = $_POST['pseudo'];
    $password = $_POST['password'];

    // Préparation et exécution de la requête pour vérifier les informations de connexion
    $users = $conn->prepare("SELECT * FROM users WHERE pseudo = ? AND motdepasse = ?");
    $users->execute([$username, $password]);

    // Vérification si des résultats ont été trouvés dans la base de données
    if ($users->rowCount() > 0) {
        // Attribution des valeurs de session
        $_SESSION['pseudo'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $users->fetch(PDO::FETCH_ASSOC)['id'];

        // Redirection vers la page d'accueil après une connexion réussie
        header('Location: ../Front/Template/Accueil.php');
    }
}
?>
