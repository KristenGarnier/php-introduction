<?php
include_once __DIR__ . '/contollerBase.php'; // On utilise include once ici, pour être sur de ne pas l'inclure deux fois dans le cas d'un site avec multiples controllers

class CityController extends ContollerBase { // On extends controller base pour béféficier des ces fonctionnalités (prorpiété model et méthode render)
    public function __construct($model)
    {
        parent::__construct($model); // on initialise le parent sinon nous n'avons pas accès a ses méthodes
    }

    public function citiesHandler() { // Définition d'une méthode pour controller les données de la route cities
        $cities = $this->model->getAll(); // Récupération des données

        $this->render('cities', ['cities' => $cities]); // on utilise la méthode render pour afficher le template et lui faire passer du contenu
    }

    public function cityHandler() { // Définition d'une méthode pour controller les données de la route city
        if(!key_exists('id', $_GET)) { // On vérifie si on a bien les informations
            $this->render('404'); // On affiche la page 404 si il n'y  a pas ce que l'on veut
        }

        $id = $_GET['id'];
        $cities = $this->model->getAll(); // Récupération des cities

        $this->render('city', ['city' => $cities[$id]]); // Envoi de la ville choisie
    }
}