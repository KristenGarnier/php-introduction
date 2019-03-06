<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-02-28
 * Time: 15:10
 */

require_once ('ControllerBase.php');

class CityController extends ControllerBase
{
    public function __construct($model) {
        parent::__construct($model);
    }

    public function citiesHandler() {
        $cities = $this->model->findAll();
        $this->render('cities', ["cities" => $cities]);
    }

    public function cityHandler($id) {
        if(!$id) { // On vérifie si on a bien les informations
            $this->render('404'); // On affiche la page 404 si il n'y  a pas ce que l'on veut
        }
        $city = $this->model->findOne($id); // Récupération des cities
        $this->render('city', ['city' => $city]); // Envoi de la ville choisie
    }
}