<?php
// Inclusion du fichier utilisateur
include "user.php";

// Connexion à la base de données MySQL
$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');

// Vérification si le formulaire a été soumis
if (isset($_POST["submit123"])) {
    // Récupération du modèle de CV sélectionné
    $template = $_POST["selectedImage"];

    // Insertion d'une nouvelle entrée dans la table 'cv' avec le modèle et l'identifiant de l'utilisateur
    $insert = $conn->prepare('INSERT INTO cv (model, user_id) VALUES (?, ?)');
    $insert->execute([$template, getUserID()]);

    // Récupération des expériences professionnelles de l'utilisateur
    $experiences = $conn->prepare('SELECT * FROM experiences_professionnelles WHERE user_id = ?');
    $experiences->execute([getUserID()]);

    // Boucle à travers les expériences professionnelles pour établir des liaisons avec le nouveau CV
    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        $ID = $row['ID'];
        if (!empty($_POST["experiences$ID"])) {
            // Insertion d'une liaison entre l'expérience professionnelle et le CV
            $experience = $conn->prepare('INSERT INTO liaison_experience VALUES (?, ?)');
            $experience->execute([getCVID(), $ID]);
        }
    }

    // Redirection vers la page du CV nouvellement créé
    header("Location: ../Template/CV" . $template . ".php");
}

// Fonction pour récupérer l'identifiant du dernier CV créé par l'utilisateur
function getCVID()
{
    global $conn;
    // Sélection du dernier CV créé par l'utilisateur
    $stmt = $conn->prepare("SELECT * FROM cv WHERE user_id = ? ORDER BY id DESC LIMIT 1");
    $stmt->execute([getUserID()]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result[0]['ID'];
}
?>
