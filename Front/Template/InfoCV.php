<?php
// Inclusion du fichier CV.php et démarrage de la session
include "../../public/CV.php";
session_start();

// Connexion à la base de données MySQL
$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon CV</title>
    <link rel="stylesheet" href="../Css/InfoCV.css">
</head>

<body>
<?php
// Vérification si l'utilisateur est connecté
if (isset($_SESSION['password']))  {
    ?>
    <!-- Formulaire pour afficher le CV de l'utilisateur -->
    <form action="" method="post">
        <div class="main-block">
            <h2>Parcours Académiques</h2>
            <!-- Affichage des parcours académiques de l'utilisateur -->
            <?php
            $academics = $conn->query('SELECT * FROM parcours_academiques');

            while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
                if (intval(getUserID()) == $row['user_id']) {
                    echo "<div class='academic-item'>";
                    echo "<p>Diplôme: " . $row['diplome'] . "</p>";
                    echo "<p>Etablissement: " . $row['etablissement'] . "</p>";
                    echo "<p>Date: " . $row['date_debut'] . " au " . $row['date_fin'] . "</p>";
                    echo "<p>Description: " . $row['description'] . "</p>";
                    echo '<input type="checkbox" name="parcours" value="etudes">';
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class="main-block">
            <h2>Expériences Professionnelles</h2>
            <!-- Affichage des expériences professionnelles de l'utilisateur -->
            <?php
            $experiences = $conn->query('SELECT * FROM experiences_professionnelles');

            while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
                if (intval(getUserID()) == $row['user_id']) {
                    echo "<div class='experience-item'>";
                    echo "<p>Nom de l'entreprise: " . $row['nom_entreprise'] . "</p>";
                    echo "<p>Poste: " . $row['poste'] . "</p>";
                    echo "<p>Durée: " . $row['date_debut'] . " au " . $row['date_fin'] . "</p>";
                    echo "<p>Description: " . $row['description'] . "</p>";
                    echo "<input type='checkbox' name='experiences{$row['ID']}' value='travail'>";
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class="main-block">
            <h2>Hobbies</h2>
            <!-- Affichage des hobbies de l'utilisateur -->
            <?php
            $hobbies = $conn->query('SELECT * FROM hobbies');

            while ($row = $hobbies->fetch(PDO::FETCH_ASSOC)) {
                if (intval(getUserID()) == $row['user_id']) {
                    echo "<div class='hobby-item'>";
                    echo "<p>Nom du loisir: " . $row['hobby'] . "</p>";
                    echo '<input type="checkbox" name="hobbies" value="loisir">';
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class="main-block">
            <h2>Images</h2>
            <div class="main-block2">
                <!-- Affichage des images disponibles -->
                <div>
                    <img src="../../img/Capture%20d'écran%202024-02-08%20163642.png" alt="Image 1" width="100">
                    <label><input type="radio" name="selectedImage" value="1"></label>
                </div>

                <div>
                    <img src="../../img/Capture%20d'écran%202024-02-08%20163710.png" alt="Image 2" width="100">
                    <label><input type="radio" name="selectedImage" value="2"></label>
                </div>

                <div>
                    <img src="../../img/Capture%20d'écran%202024-02-08%20163738.png" alt="Image 3" width="100">
                    <label><input type="radio" name="selectedImage" value="3"></label>
                </div>
            </div>
        </div>

        <div class="main-block">
            <input type="submit" name="submit123" value="Valider">
            <a href="Accueil.php">
                <input type="button" name="submit2" value="Retour page d'Accueil">
            </a>
        </div>
    </form>
    <?php
} else {
    // Affichage si l'utilisateur n'est pas connecté
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
