<?php
// Add
function addUser($pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo = null) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $insert = $conn->prepare('INSERT INTO users (pseudo, nom, prenom, motdepasse, email, numerotel, photo) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $insert->execute([$pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo]);
}

// Update
function updateUser($pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo = null) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $update = $conn->prepare('UPDATE users SET pseudo=?, nom=?, prenom=?, motdepasse=?, email=?, numerotel=?, photo=? WHERE ID=?');
    $update->execute([$pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo]);
}

// Delete
function deleteUser($userID) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $delete = $conn->prepare('DELETE FROM users WHERE ID=?');
    $delete->execute([$userID]);
}

// Get
function getUser($userID)
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $query = "SELECT * FROM users WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserByPseudo($pseudo)
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $query = "SELECT * FROM users WHERE pseudo=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$pseudo]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getUserID()
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $stmt = $conn->prepare("SELECT id FROM users WHERE pseudo = ?");
    $stmt->execute([$_SESSION['pseudo']]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>