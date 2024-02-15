<?php
include "user.php";

$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');

    if (isset($_POST["submit123"])) {
        $template = $_POST["selectedImage"];

        $insert = $conn->prepare('INSERT INTO cv (model, user_id) VALUES (?, ?)');
        $insert->execute([$template, getUserID()]);


        $experiences = $conn->prepare('SELECT * FROM experiences_professionnelles WHERE user_id = ?');
        $experiences->execute([getUserID()]);

        while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
            $ID = $row['ID'];
            if (!empty($_POST["experiences$ID"])){
                $experience = $conn->prepare('INSERT INTO liaison_experience VALUES (?, ?)');
                $experience->execute([getCVID(), $ID]);
            }
        }
        header("Location: ../Template/CV" . $template . ".php");
    }

    function getCVID()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM cv WHERE user_id = ? ORDER BY id DESC LIMIT 1");
        $stmt->execute([getUserID()]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($result);

        return $result[0]['ID'];
    }
?>