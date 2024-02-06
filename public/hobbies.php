<?php
include "../config/config.php";
// Add
function addHobby($hobby) {
    global $conn;
    $insert = $conn->prepare('INSERT INTO hobbies (hobby) VALUES (?)');
    $insert->execute([$hobby]);
}

// Update
function updateHobby($hobbyID, $hobby) {
    global $conn;
    $update = $conn->prepare('UPDATE hobbies SET hobby=? WHERE ID=?');
    $update->execute([$hobby, $hobbyID]);
}

// Delete
function deleteHobby($hobbyID) {
    global $conn;
    $delete = $conn->prepare('DELETE FROM hobbies WHERE ID=?');
    $delete->execute([$hobbyID]);
}

// Get
function getHobby($hobbyID)
{
    global $conn;
    $query = "SELECT * FROM hobbies WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$hobbyID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>