<?php
include "../config/config.php";
include "../public/user.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["Nomutilisateur"];
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatpassword"];
    $numeroTelephone = $_POST["numeroTelephone"];

    if ($password == $repeatPassword) {
        addUser($pseudo, $nom, $prenom, $password, $email, $numeroTelephone);
        header("Location: ../public/index.php");
        exit();
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}
?>