<?php
include __DIR__ . '/../database/db.php';
include __DIR__ . '/../model/cities.php';
include __DIR__ . '/../controller/city.php';

$db = new Database();// Création d'une instance de base de donnée, utilisée pour la connexion avec la base de donnée
$cityModel = new CityModel($db);
$controller = new CityController($cityModel);
$controller->cityHandler();