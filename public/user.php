<?php
// Add
function addUser($pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo = null) {
    global $conn;
    $insert = $conn->prepare('INSERT INTO users (pseudo, nom, prenom, motdepasse, email, numerotel, photo) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $insert->execute([$pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo]);
}

// Update
function updateUser($pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo = null) {
    global $conn;
    $update = $conn->prepare('UPDATE users SET pseudo=?, nom=?, prenom=?, motdepasse=?, email=?, numerotel=?, photo=? WHERE ID=?');
    $update->execute([$pseudo, $nom, $prenom, $motDePasse, $adresseMail, $numeroTelephone, $photo]);
}

// Delete
function deleteUser($userID) {
    global $conn;
    $delete = $conn->prepare('DELETE FROM users WHERE ID=?');
    $delete->execute([$userID]);
}

// Get
function getUser($userID)
{
    global $conn;
    $query = "SELECT * FROM users WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>