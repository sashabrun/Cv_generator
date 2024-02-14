<?php
// Add
function addHobby($hobby, $user_id) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $insert = $conn->prepare('INSERT INTO hobbies (hobby, user_id) VALUES (?, ?)');
    $insert->execute([$hobby, $user_id]);
}

// Update
function updateHobby($hobbyID, $hobby) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $update = $conn->prepare('UPDATE hobbies SET hobby=? WHERE ID=?');
    $update->execute([$hobby, $hobbyID]);
}

// Delete
function deleteHobby($hobbyID) {
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $delete = $conn->prepare('DELETE FROM hobbies WHERE ID=?');
    $delete->execute([$hobbyID]);
}

// Get
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