<?php
include "../config/config.php";
include "../public/hobbies.php";
include "../public/parcours.php";
include "../public/experiences.php";

if (isset($_POST["submit"])) {
    $diplome = isset($_POST["qualification"]);
    $etablissement = isset($_POST["school"]);
    $date_debut = isset($_POST["dateStart"]);
    $date_fin = isset($_POST["dateEnd"]);
    $description = isset($_POST["descriptions"]);

    if (!empty($diplome) || !empty($etablissement) || !empty($date_debut) || !empty($date_fin) || !empty($description)) {
        header("Location: ../Front/Template/Infos.php");
    } else {
        addParcours($diplome, $etablissement, $date_debut, $date_fin, $description);
        header("Location: ../Front/Template/Infos.php");
    }
}

if (isset($_POST["submit2"])) {
    $entreprise = isset($_POST["company"]);
    $poste = isset($_POST["post"]);
    $date_debut_exp = isset($_POST["dateStart2"]);
    $date_fin_exp = isset($_POST["dateEnd2"]);
    $description_exp = isset($_POST["descriptions2"]);

    if (!empty($entreprise) || !empty($poste) || !empty($date_debut_exp) || !empty($date_fin_exp) || !empty($description_exp)) {
        header("Location: ../Front/Template/Infos.php");
    } else {
        addExperience($entreprise, $poste, $date_debut_exp, $date_fin_exp, $description_exp);
        header("Location: ../Front/Template/Infos.php");
    }
}

if (isset($_POST["submit3"])) {
    $hobby = isset($_POST["hobby"]);
    if (!empty($hobby)) {
        header("Location: ../Front/Template/Infos.php");
    } else {
        addHobby($hobby);
        header("Location: ../Front/Template/Infos.php");
    }
}

if (isset($_POST["modif"])) {
    $diplome = isset($_POST["qualification"]);
    $etablissement = isset($_POST["school"]);
    $date_debut = isset($_POST["dateStart"]);
    $date_fin = isset($_POST["dateEnd"]);
    $description = isset($_POST["descriptions"]);
    $parcoursID = isset($_POST["ID"]);

        updateParcours($parcoursID, $diplome, $etablissement, $date_debut, $date_fin, $description);
        header("Location: ../Front/Template/Infos.php");
}
?>