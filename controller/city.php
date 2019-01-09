<?php
include_once __DIR__ . '/contollerBase.php'; // On utilise include once ici, pour être sur de ne pas l'inclure deux fois dans le cas d'un site avec multiples controllers

class CityController extends ContollerBase {
    public function __construct($model)
    {
        parent::__construct($model); // on initialise le parent
    }

    public function citiesHandler() {
        $cities = $this->model->getAll();

        $this->render('cities', ['cities' => $cities]); // on utilise la méthode render pour afficher le template et lui faire passer du contenu
    }

    public function cityHandler() {
        if(!key_exists('id', $_GET)) {
            $this->render('404');
        }

        $id = $_GET['id'];
        $cities = $this->model->getAll();

        $this->render('city', ['city' => $cities[$id]]);
    }
}