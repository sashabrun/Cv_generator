<?php

// Fonction pour ajouter un parcours académique
function addParcours($diplome, $etablissement, $date_debut, $date_fin, $description, $user_id) {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');

    // Requête préparée pour insérer un nouveau parcours académique
    $insert = $conn->prepare('INSERT INTO parcours_academiques (diplome, etablissement, date_debut, date_fin, description, user_id) VALUES (?, ?, ?, ?, ?, ?)');

    // Exécution de la requête avec les paramètres fournis
    $insert->execute([$diplome, $etablissement, $date_debut, $date_fin, $description, $user_id]);
}

// Fonction pour mettre à jour un parcours académique
function updateParcours($parcoursID, $diplome, $etablissement, $date_debut, $date_fin, $description) {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');

    // Requête préparée pour mettre à jour un parcours académique
    $update = $conn->prepare('UPDATE parcours_academiques SET diplome=?, etablissement=?, date_debut=?, date_fin=?, description=? WHERE ID=?');

    // Exécution de la requête avec les paramètres fournis
    $update->execute([$diplome, $etablissement, $date_debut, $date_fin, $description, $parcoursID]);
}

// Fonction pour supprimer un parcours académique
function deleteParcours($parcoursID) {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');

    // Requête préparée pour supprimer un parcours académique
    $delete = $conn->prepare('DELETE FROM parcours_academiques WHERE ID=?');

    // Exécution de la requête avec le paramètre fourni
    $delete->execute([$parcoursID]);
}

// Fonction pour récupérer un parcours académique par son ID
function getParcours($parcoursID)
{
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');

    // Requête préparée pour sélectionner un parcours académique par son ID
    $query = "SELECT * FROM parcours_academiques WHERE ID=?";
    $stmt = $conn->prepare($query);

    // Exécution de la requête avec le paramètre fourni
    $stmt->execute([$parcoursID]);

    // Récupération des résultats de la requête
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats
    return $result;
}

?>
