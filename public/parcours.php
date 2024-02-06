<?php
include "../config/config.php";
// Add
function addParcours($diplome, $etablissement, $date_debut, $date_fin, $description) {
    global $conn;
    $insert = $conn->prepare('INSERT INTO parcours_academiques (diplome, etablissement, date_debut, date_fin, description) VALUES (?, ?, ?, ?, ?)');
    $insert->execute([$diplome, $etablissement, $date_debut, $date_fin, $description]);
}

// Update
function updateParcours($parcoursID, $diplome, $etablissement, $date_debut, $date_fin, $description) {
    global $conn;
    $update = $conn->prepare('UPDATE parcours_academiques SET diplome=?, etablissement=?, date_debut=?, date_fin=?, description=? WHERE ID=?');
    $update->execute([$diplome, $etablissement, $date_debut, $date_fin, $description, $parcoursID]);
}

// Delete
function deleteParcours($parcoursID) {
    global $conn;
    $delete = $conn->prepare('DELETE FROM parcours_academiques WHERE ID=?');
    $delete->execute([$parcoursID]);
}

// Get
function getParcours($parcoursID)
{
    global $conn;
    $query = "SELECT * FROM parcours_academiques WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$parcoursID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>