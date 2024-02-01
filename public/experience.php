<?php

function getExperience($userID) {
    global $conn;
    $query = "SELECT * FROM experience WHERE ID=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    return $result;
}
?>