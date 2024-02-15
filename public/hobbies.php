<?php
// Fonction pour ajouter un nouveau loisir
function addHobby($hobby, $user_id) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $insert = $conn->prepare('INSERT INTO hobbies (hobby, user_id) VALUES (?, ?)');
    $insert->execute([$hobby, $user_id]);
}

// Fonction pour mettre à jour un loisir existant
function updateHobby($hobbyID, $hobby) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $update = $conn->prepare('UPDATE hobbies SET hobby=? WHERE ID=?');
    $update->execute([$hobby, $hobbyID]);
}

// Fonction pour supprimer un loisir
function deleteHobby($hobbyID) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $delete = $conn->prepare('DELETE FROM hobbies WHERE ID=?');
    $delete->execute([$hobbyID]);
}

// Fonction pour récupérer les détails d'un loisir
function getHobby($hobbyID)
{
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $query = "SELECT * FROM hobbies WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$hobbyID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
