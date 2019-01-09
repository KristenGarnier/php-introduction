<?php

include __DIR__ . '/../database/db.php';
include __DIR__ . '/../model/cities.php';
include __DIR__ . '/../controller/city.php';

// On importe nos scripts ci dessus

$db = new Database();// Création d'une instance de base de donnée, utilisée pour la connexion avec la base de donnée
$cityModel = new CityModel($db); // Création du modèle nous permettant de récupérer les données
$controller = new CityController($cityModel); // On initialise le controller avec le modèle
$controller->citiesHandler(); // On lance la méthode dédiée à cette route