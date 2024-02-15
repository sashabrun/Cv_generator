<?php
// Fonction pour ajouter un utilisateur à la base de données
function addUser($pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo = null) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $insert = $conn->prepare('INSERT INTO users (pseudo, nom, prenom, motdepasse, email, numerotel, photo) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $insert->execute([$pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo]);
}

// Fonction pour mettre à jour les informations d'un utilisateur dans la base de données
function updateUser($pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo = null) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $update = $conn->prepare('UPDATE users SET pseudo=?, nom=?, prenom=?, motdepasse=?, email=?, numerotel=?, photo=? WHERE ID=?');
    $update->execute([$pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo]);
}

// Fonction pour supprimer un utilisateur de la base de données
function deleteUser($userID) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $delete = $conn->prepare('DELETE FROM users WHERE ID=?');
    $delete->execute([$userID]);
}

// Fonction pour récupérer les informations d'un utilisateur à partir de son ID
function getUser($userID)
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $query = "SELECT * FROM users WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour récupérer les informations d'un utilisateur à partir de son pseudo
function getUserByPseudo($pseudo)
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $query = "SELECT * FROM users WHERE pseudo=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$pseudo]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Fonction pour récupérer l'ID d'un utilisateur à partir de son pseudo
function getUserID()
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $stmt = $conn->prepare("SELECT id FROM users WHERE pseudo = ?");
    $stmt->execute([$_SESSION['pseudo']]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
