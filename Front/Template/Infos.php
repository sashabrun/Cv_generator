<?php
include "../../public/user.php";
include "../../public/hobbies.php";
include "../../public/parcours.php";
include "../../public/experiences.php";

session_start();
$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/Infos.css">
    <meta charset="UTF-8">
    <title>Informations</title>
</head>
<body>
<?php
if (isset($_SESSION['password']))  {
?>
<div class="container">
    <h1>Parcours Académique</h1>
    <h2>Ajouter une formation :</h2>
    <form action="../../public/infos2.php" method="post">

        <label>Diplôme :</label>
        <input name="qualification" type="text" />

        <label>Etablissement :</label>
        <input name="school" type="text" /></p>

        <label>Date :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart" type="date">
            <p>au</p>
            <input name="dateEnd" type="date" />
        </div>

        <label>Description :</label>
        <input name="descriptions" type="text" /></p>


        <input type="submit" name="submit" value="Ajouter">
    </form>
    <?php
    $academics = $conn->query('SELECT * FROM parcours_academiques');

    while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
        if (intval(getUserID()) == $row['user_id']) {
            echo "<div class='academic-item'>";
            echo "<p>Diplôme: " . $row['diplome'] . "</p>";
            echo "<p>Etablissement: " . $row['etablissement'] . "</p>";
            echo "<p>Date: " . $row['date_debut'] . " au " . $row['date_fin'] . "</p>";
            echo "<p>Description: " . $row['description'] . "</p>";
            echo "<button name='modif'>Modifier</button>";
            echo "<button name='Supp'>Supprimer</button>";
            if (isset($_POST['modif'])) {
                echo "<form action='infos2.php' method='post'>";
                echo "<input type='text' name='diplome' value='" . $row['diplome'] . "'>";
                echo "<input type='text' name='etablissement' value='" . $row['etablissement'] . "'>";
                echo "<input type='date' name='date_debut' value='" . $row['date_debut'] . "'>";
                echo "<input type='date' name='date_fin' value='" . $row['date_fin'] . "'>";
                echo "<input type='text' name='description' value='" . $row['description'] . "'>";
                echo "<input type='submit' name='submit' value='Modifier'>";
                echo "</form>";
            }
            if (isset($_POST['Supp'])) {
                deleteParcours($row['ID']);
            }
            echo "</div>";
        }
    }
    ?>
</div>
<div class="container">
    <h1>Expériences Professionnelle</h1>
    <h2>Ajouter une expérience :</h2>
    <form action="../../public/infos2.php" method="post">

        <label>Nom de l'entreprise :</label>
        <input name="company" type="text" />

        <label>Poste :</label>
        <input name="post" type="text" />

        <label>Durée :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart2" type="date">
            <p>au</p>
            <input name="dateEnd2" type="date" />
        </div>

        <label>Description :</label>
        <input name="descriptions2" type="text" /></p>

        <input type="submit" name="submit2" value="Ajouter">
    </form>
    <?php
    $experiences = $conn->query('SELECT * FROM experiences_professionnelles');

    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        if (intval(getUserID()) == $row['user_id']) {
            echo "<div class='experience-item'>";
            echo "<p>Nom de l'entreprise: " . $row['nom_entreprise'] . "</p>";
            echo "<p>Poste: " . $row['poste'] . "</p>";
            echo "<p>Durée: " . $row['date_debut'] . " au " . $row['date_fin'] . "</p>";
            echo "<p>Description: " . $row['description'] . "</p>";
            echo "<button name='modif'>Modifier</button>";
            echo "<button name='Supp'>Supprimer</button>";
            if (isset($_POST['modif'])) {
                echo "<form action='infos2.php' method='post'>";
                echo "<input type='text' name='nom_entreprise' value='" . $row['nom_entreprise'] . "'>";
                echo "<input type='text' name='poste' value='" . $row['poste'] . "'>";
                echo "<input type='date' name='date_debut' value='" . $row['date_debut'] . "'>";
                echo "<input type='date' name='date_fin' value='" . $row['date_fin'] . "'>";
                echo "<input type='text' name='description' value='" . $row['description'] . "'>";
                echo "<input type='submit' name='submit' value='Modifier'>";
                echo "</form>";
            }
            if (isset($_POST['Supp'])) {
                deleteExperience($row['ID']);
            }
            echo "</div>";
        }
    }
    ?>
</div>
<div class="container">
    <h1>Loisirs</h1>
    <h2>Ajouter un loisir :</h2>
    <form action="../../public/infos2.php" method="post">

        <label>Nom du loisir :</label>
        <input name="loisir" type="text" />

        <input type="submit" name="submit3" value="Ajouter">

    </form>
    <?php
    $hobbies = $conn->query('SELECT * FROM hobbies');

    while ($row = $hobbies->fetch(PDO::FETCH_ASSOC)) {
        if (intval(getUserID()) == $row['user_id']) {
            echo "<div class='hobby-item'>";
            echo "<p>Nom du loisir: " . $row['hobby'] . "</p>";
            echo "<button name='modif'>Modifier</button>";
            echo "<button name='Supp'>Supprimer</button>";
            if (isset($_POST['modif'])) {
                echo "<form action='infos2.php' method='post'>";
                echo "<input type='text' name='hobby' value='" . $row['hobby'] . "'>";
                echo "<input type='submit' name='submit' value='Modifier'>";
                echo "</form>";
            }
            if (isset($_POST['Supp'])) {
                deleteHobby($row['ID']);
            }
            echo "</div>";
        }
    }
    ?>
</div>
<a href="Accueil.php">
    <input type="button" name="submit4" value="Retour page d'Accueil">
</a>

    <?php
} else {
    ?>

    <div class="container">
        <h1>Veuillez vous connecter</h1>
        <a href="Connexion.html">
            <input type="button" value="Connexion">
        </a>
    </div>
    <?php
}
?>
</body>
</html>