<?php
include "../config/config.php";
include "../public/hobbies.php";
include "../public/parcours.php";
include "../public/experiences.php";

session_start();

// Fonction pour obtenir l'ID de l'utilisateur à partir de la session
function UserID()
{
    global $conn;
    $stmt = $conn->prepare("SELECT id FROM users WHERE pseudo = ?");
    $stmt->execute([$_SESSION['pseudo']]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Traitement lors de la soumission du formulaire pour le parcours académique
if (isset($_POST["submit"])) {
    $diplome = $_POST["qualification"];
    $etablissement = $_POST["school"];
    $date_debut = $_POST["dateStart"];
    $date_fin = $_POST["dateEnd"];
    $description = $_POST["descriptions"];
    $userID = intval(UserID());

    // Vérification si des champs sont vides
    if (empty($diplome) || empty($etablissement) || empty($date_debut) || empty($date_fin) || empty($description) || empty($userID)){
        header("Location: ../Front/Template/Infos.php");
    } else {
        // Ajout du parcours académique
        addParcours($diplome, $etablissement, $date_debut, $date_fin, $description, $userID);
        header("Location: ../Front/Template/Infos.php");
    }
}

// Traitement lors de la soumission du formulaire pour l'expérience professionnelle
if (isset($_POST["submit2"])) {
    $entreprise = $_POST["company"];
    $poste = $_POST["post"];
    $date_debut_exp = $_POST["dateStart2"];
    $date_fin_exp = $_POST["dateEnd2"];
    $description_exp = $_POST["descriptions2"];
    $userID = intval(UserID());

    // Vérification si des champs sont vides
    if (empty($entreprise) || empty($poste) || empty($date_debut_exp) || empty($date_fin_exp) || empty($description_exp)|| empty($userID)) {
        header("Location: ../Front/Template/Infos.php");
    } else {
        // Ajout de l'expérience professionnelle
        addExperience($entreprise, $poste, $date_debut_exp, $date_fin_exp, $description_exp, $userID);
        header("Location: ../Front/Template/Infos.php");
    }
}

// Traitement lors de la soumission du formulaire pour les loisirs
if (isset($_POST["submit3"])) {
    $hobby = $_POST['loisir'];
    $userID = intval(UserID());

    // Vérification si des champs sont vides
    if (empty($hobby)|| empty($userID)) {
        header("Location: ../Front/Template/Infos.php");
    } else {
        // Ajout du loisir
        addHobby($hobby, $userID);
        header("Location: ../Front/Template/Infos.php");
    }
}

// Traitement lors de la soumission du formulaire de modification
if (isset($_POST["modif"])) {
    $diplome = $_POST["qualification"];
    $etablissement = $_POST["school"];
    $date_debut = $_POST["dateStart"];
    $date_fin = $_POST["dateEnd"];
    $description = $_POST["descriptions"];
    $parcoursID = $_POST["ID"];

    // Mise à jour du parcours académique
    updateParcours($parcoursID, $diplome, $etablissement, $date_debut, $date_fin, $description);
    header("Location: ../Front/Template/Infos.php");
}
?>
