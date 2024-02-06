<?php
include "../config/config.php";
// Add
function addExperience($nom_entreprise, $poste, $date_debut, $date_fin, $description) {
    global $conn;
    $insert = $conn->prepare('INSERT INTO experiences_professionnelles (nom_entreprise, poste, date_debut, date_fin, description) VALUES (?, ?, ?, ?, ?)');
    $insert->execute([$nom_entreprise, $poste, $date_debut, $date_fin, $description]);
}

// Update
function updateExperience($experienceID, $nom_entreprise, $poste, $date_debut, $date_fin, $description) {
    global $conn;
    $update = $conn->prepare('UPDATE experiences_professionnelles SET nom_entreprise=?, poste=?, date_debut=?, date_fin=?, description=? WHERE ID=?');
    $update->execute([$nom_entreprise, $poste, $date_debut, $date_fin, $description, $experienceID]);
}

// Delete
function deleteExperience($experienceID) {
    global $conn;
    $delete = $conn->prepare('DELETE FROM experiences_professionnelles WHERE ID=?');
    $delete->execute([$experienceID]);
}

// Get
function getExperience($experienceID)
{
    global $conn;
    $query = "SELECT * FROM experiences_professionnelles WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$experienceID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>