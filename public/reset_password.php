<?php
include "../config/config.php";
global $conn;

if (isset($_POST['submit'])) {
    $pseudo2 = $_POST['pseudo'];
    $email2 = $_POST['email'];
    $password = $_POST['new_password'];
    $password_confirm = $_POST['confirm_new_password'];

    if ($password == $password_confirm) {
        $users = $conn->prepare("SELECT * FROM users WHERE pseudo = ? AND email = ?");
        $users->execute([$pseudo2, $email2]);

        if ($users->rowCount() > 0) {
            $updatePassword = $conn->prepare("UPDATE users SET motdepasse = ? WHERE pseudo = ? AND email = ?");
            $updatePassword->execute([$password, $pseudo2, $email2]);
            header('Location: ../Front/Template/Connexion.html');
        } else {
            header('Location: ../Front/Template/MDP.html');
        }
    } else {
        header('Location: ../Front/Template/MDP.html');
    }
}
?>
