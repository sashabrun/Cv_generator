<?php
include "../config/config.php";
include "../public/hobbies.php";
include "../public/parcours.php";
include "../public/experiences.php";

if (isset($_POST["submit"])) {
    $diplome = isset($_POST["qualification"]) ? $_POST["qualification"] : null;
    $etablissement = isset($_POST["school"]) ? $_POST["school"] : null;
    $date_debut = isset($_POST["dateStart"]) ? $_POST["dateStart"] : null;
    $date_fin = isset($_POST["dateEnd"]) ? $_POST["dateEnd"] : null;
    $description = isset($_POST["descriptions"]) ? $_POST["descriptions"] : null;

        addParcours($diplome, $etablissement, $date_debut, $date_fin, $description);
}

if (isset($_POST["submit2"])) {
    $entreprise = isset($_POST["company"]) ? $_POST["company"] : null;
    $poste = isset($_POST["post"]) ? $_POST["post"] : null;
    $date_debut_exp = isset($_POST["dateStart2"]) ? $_POST["dateStart2"] : null;
    $date_fin_exp = isset($_POST["dateEnd2"]) ? $_POST["dateEnd2"] : null;
    $description_exp = isset($_POST["descriptions2"]) ? $_POST["descriptions2"] : null;

        addExperience($entreprise, $poste, $date_debut_exp, $date_fin_exp, $description_exp);
}

if (isset($_POST["submit3"])) {
    $hobby = isset($_POST["hobby"]) ? $_POST["hobby"] : null;
        addHobby($hobby);
}
?>