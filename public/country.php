<?php
include __DIR__ . '/../database/db.php';
include __DIR__ . '/../model/cities.php';
include __DIR__ . '/../controller/countries.php';

$db = new Database();// Création d'une instance de base de donnée, utilisée pour la connexion avec la base de donnée
$cityModel = new CityModel($db); // Mise en place du modèle
$controller = new CountryController($cityModel); // Création du controller
$controller->countryHandler();