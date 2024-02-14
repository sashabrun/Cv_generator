<?php

// Add
function addParcours($diplome, $etablissement, $date_debut, $date_fin, $description, $user_id) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $insert = $conn->prepare('INSERT INTO parcours_academiques (diplome, etablissement, date_debut, date_fin, description, user_id) VALUES (?, ?, ?, ?, ?, ?)');
    $insert->execute([$diplome, $etablissement, $date_debut, $date_fin, $description, $user_id]);
}

// Update
function updateParcours($parcoursID, $diplome, $etablissement, $date_debut, $date_fin, $description) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $update = $conn->prepare('UPDATE parcours_academiques SET diplome=?, etablissement=?, date_debut=?, date_fin=?, description=? WHERE ID=?');
    $update->execute([$diplome, $etablissement, $date_debut, $date_fin, $description, $parcoursID]);
}

// Delete
function deleteParcours($parcoursID) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $delete = $conn->prepare('DELETE FROM parcours_academiques WHERE ID=?');
    $delete->execute([$parcoursID]);
}

// Get
function getParcours($parcoursID)
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $query = "SELECT * FROM parcours_academiques WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$parcoursID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>