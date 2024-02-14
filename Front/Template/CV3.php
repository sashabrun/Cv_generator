
<?php
include "../../public/user.php";
include "../../public/CV.php";

session_start();
$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Nom - Curriculum Vitae</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            margin: 20px;
            box-sizing: border-box;
        }

        .left-side {
            background-color: #8c2121;
            color: #fff;
            padding: 20px;
            width: 30%;
            box-sizing: border-box;
            min-height: 297mm;
            padding-top: 50px;
            position: relative;
        }

        .right-side {
            padding: 20px;
            width: 70%;
            box-sizing: border-box;
        }

        header h1, header p {
            margin: 0;
        }

        section {
            margin: 20px 0;
        }

        .experience, .education, .skills {
            margin-bottom: 30px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        .skills ul {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .skills li {
            background-color: #8c2121;
            color: #fff;
            padding: 8px 15px;
            margin: 5px 0;
            border-radius: 3px;
        }
        input[type="button"] {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        input[type='submit'],
        input[type='button'] {
            margin-left: 11px;
            width: 98%;
            padding: 10px;
            background-color: #003c7c;
            color: #fff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        input[type='submit']:hover,
        input[type='button']:hover {
            background-color: #0081ff;
        }
    </style>
</head>
<body>
<div class="container" id="pdfContainer">
    <div class="left-side">
        <header>
            <?php
            $users = $conn->query('SELECT * FROM users');

            while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
                echo "<H1>" . $row['nom'] . "</H1>";
                echo "<H2>" . $row['prenom'] . "</H2>";
                echo "<p>" . $row['email'] . "</p>";
                echo "<p>" . $row['numerotel'] . "</p>";
            }
            ?>
        </header>
    </div>

    <div class="right-side">
        <section class="experience">
            <h2>Expérience Professionnelle</h2>
            <?php
            $experiences = $conn->query('SELECT * FROM experiences_professionnelles');

            while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
                if (intval(getUserID()) == $row['user_id']) {
                    echo "<div class='experience-item'>";
                    echo "<H3>Nom de l'entreprise: " . $row['nom_entreprise'] . "</H3>";
                    echo "<p>Poste: " . $row['poste'] . "</p>";
                    echo "<p>Durée: " . $row['date_debut'] . " au " . $row['date_fin'] . "</p>";
                    echo "<p>Description: " . $row['description'] . "</p>";
                    echo "</div>";
                }
            }
            ?>
        </section>

        <section class="education">
            <h2>Parcours Académiques</h2>
            <?php
            $academics = $conn->query('SELECT * FROM parcours_academiques');

            while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
                if (intval(getUserID()) == $row['user_id']) {
                    echo "<div class='academic-item'>";
                    echo "<H3>Diplôme: " . $row['diplome'] . "</H3>";
                    echo "<p>Etablissement: " . $row['etablissement'] . "</p>";
                    echo "<p>Date: " . $row['date_debut'] . " au " . $row['date_fin'] . "</p>";
                    echo "<p>Description: " . $row['description'] . "</p>";
                    echo "</div>";
                }
            }
            ?>
        </section>

        <section class="skills">
            <h2>Loisirs</h2>
            <?php
            $hobbies = $conn->query('SELECT * FROM hobbies');

            while ($row = $hobbies->fetch(PDO::FETCH_ASSOC)) {
                if (intval(getUserID()) == $row['user_id']) {
                    echo "<div class='hobby-item'>";
                    echo "<H3>Nom du loisir: " . $row['hobby'] . "</H3>";
                    echo "</div>";
                }
            }
            ?>
    </div>
</div>
<div class="main-block">
    <input type="submit" name="submit" value="Enregistrer">
    <input type="button" name="submit3" value="Telecharger en PDF" onclick="">
    <a href="InfoCV.php">
        <input type="button" name="submit2" value="Retour page d'Info CV">
    </a>
</div>
</body>
</html>
