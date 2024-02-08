<?php
include "../config/config.php";
include "../public/user.php";

session_start();
global $conn;

if (isset($_POST['submit'])) {
    $username = $_POST['pseudo'];
    $password = $_POST['password'];

    $users = $conn->prepare("SELECT * FROM users WHERE pseudo = ? AND motdepasse = ?");
    $users->execute([$username, $password]);

    if ($users->rowCount() > 0) {
        $_SESSION['pseudo'] = $username;
        $_SESSION['password'] = $password;
        header('Location: ../Front/Template/Accueil.php');
    }
}
?>
