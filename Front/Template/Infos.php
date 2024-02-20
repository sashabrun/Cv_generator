<?php
// Inclusion des fichiers nécessaires
include "../../public/user.php";
include "../../public/hobbies.php";
include "../../public/parcours.php";
include "../../public/experiences.php";

// Démarrage de la session et connexion à la base de données MySQL
session_start();
$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Inclusion du fichier de style CSS -->
    <link rel="stylesheet" href="../Css/Infos.css">
    <!-- Encodage du document -->
    <meta charset="UTF-8">
    <!-- Titre de la page -->
    <title>Informations</title>
</head>
<body>
<?php
// Vérification si l'utilisateur est connecté
if (isset($_SESSION['password']))  {
    ?>
    <!-- Conteneur principal pour les informations -->
    <div class="container">
        <h1>Parcours Académique</h1>
        <h2>Ajouter une formation :</h2>
        <!-- Formulaire d'ajout de formation académique -->
        <form action="../../public/infos2.php" method="post">
            <!-- Champs du formulaire -->
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

            <!-- Bouton de soumission du formulaire -->
            <input type="submit" name="submit" value="Ajouter">
        </form>
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
                echo "<form method='post'>";
                echo "<button name='modif'>Modifier</button>";
                echo "<button name='SuppAcademic' value='{$row['ID']}'>Supprimer</button>";
                echo "</form>";
                if (isset($_POST['modif'])) {
                    // Formulaire de modification à afficher si le bouton Modifier est cliqué
                    echo "<form action='infos2.php' method='post'>";
                    echo "<input type='text' name='diplome' value='" . $row['diplome'] . "'>";
                    echo "<input type='text' name='etablissement' value='" . $row['etablissement'] . "'>";
                    echo "<input type='date' name='date_debut' value='" . $row['date_debut'] . "'>";
                    echo "<input type='date' name='date_fin' value='" . $row['date_fin'] . "'>";
                    echo "<input type='text' name='description' value='" . $row['description'] . "'>";
                    echo "<input type='submit' name='modif2' value='Modifier'>";
                    echo "</form>";
                }
                if (isset($_POST['SuppAcademic'])) {
                    // Suppression de l'expérience professionnelle si le bouton Supprimer est cliqué
                    $academicIdToDelete = $_POST['SuppAcademic'];
                    deleteParcours($academicIdToDelete);
                }
                echo "</div>";
            }
        }
        ?>
    </div>

    <!-- Conteneur pour les Expériences Professionnelles -->
    <div class="container">
        <h1>Expériences Professionnelles</h1>
        <h2>Ajouter une expérience :</h2>
        <!-- Formulaire d'ajout d'expérience professionnelle -->
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

            <!-- Bouton de soumission du formulaire -->
            <input type="submit" name="submit2" value="Ajouter">
        </form>
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
                echo "<form method='post'>";
                echo "<button name='modif'>Modifier</button>";
                echo "<button name='SuppExperience' value='{$row['ID']}'>Supprimer</button>";
                echo "</form>";
                if (isset($_POST['modif'])) {
                    // Formulaire de modification à afficher si le bouton Modifier est cliqué
                    echo "<form action='infos2.php' method='post'>";
                    echo "<input type='text' name='nom_entreprise' value='" . $row['nom_entreprise'] . "'>";
                    echo "<input type='text' name='poste' value='" . $row['poste'] . "'>";
                    echo "<input type='date' name='date_debut' value='" . $row['date_debut'] . "'>";
                    echo "<input type='date' name='date_fin' value='" . $row['date_fin'] . "'>";
                    echo "<input type='text' name='description' value='" . $row['description'] . "'>";
                    echo "<input type='submit' name='submit' value='Modifier'>";
                    echo "</form>";
                }
                if (isset($_POST['SuppExperience'])) {
                    // Suppression de l'expérience professionnelle si le bouton Supprimer est cliqué
                    $experienceIdToDelete = $_POST['SuppExperience'];
                    deleteExperience($experienceIdToDelete);
                }
                echo "</div>";
            }
        }
        ?>
    </div>

    <!-- Conteneur pour les Loisirs -->
    <div class="container">
        <h1>Loisirs</h1>
        <h2>Ajouter un loisir :</h2>
        <!-- Formulaire d'ajout de loisir -->
        <form action="../../public/infos2.php" method="post">

            <label>Nom du loisir :</label>
            <input name="loisir" type="text" />

            <!-- Bouton de soumission du formulaire -->
            <input type="submit" name="submit3" value="Ajouter">

        </form>
        <!-- Affichage des loisirs de l'utilisateur -->
        <?php
        $hobbies = $conn->query('SELECT * FROM hobbies');

        while ($row = $hobbies->fetch(PDO::FETCH_ASSOC)) {
            if (intval(getUserID()) == $row['user_id']) {
                echo "<div class='hobby-item'>";
                echo "<p>Nom du loisir: " . $row['hobby'] . "</p>";
                echo "<form method='post'>";
                echo "<button name='modif'>Modifier</button>";
                echo "<button name='SuppHobby' value='{$row['ID']}'>Supprimer</button>";
                echo "</form>";
                if (isset($_POST['modif'])) {
                    // Formulaire de modification à afficher si le bouton Modifier est cliqué
                    echo "<form action='infos2.php' method='post'>";
                    echo "<input type='text' name='hobby' value='" . $row['hobby'] . "'>";
                    echo "<input type='submit' name='submit' value='Modifier'>";
                    echo "</form>";
                }
                if (isset($_POST['SuppHobby'])) {
                    // Suppression du loisir si le bouton Supprimer est cliqué
                    $HobbyIdToDelete = $_POST['SuppHobby'];
                    deleteHobby($HobbyIdToDelete);
                }
                echo "</div>";
            }
        }
        ?>
    </div>

    <!-- Lien de retour vers la page d'accueil -->
    <a href="Accueil.php">
        <input type="button" name="submit4" value="Retour page d'Accueil">
    </a>

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
