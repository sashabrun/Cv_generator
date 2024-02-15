<?php

// Crée une nouvelle instance de la classe PDO pour établir une connexion à la base de données MySQL.
// Vous devez remplacer 'localhost' par le nom du serveur de base de données, 'database' par le nom de votre base de données,
// 'root' par le nom d'utilisateur de la base de données, et '' par le mot de passe de la base de données.
$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '');

?>
