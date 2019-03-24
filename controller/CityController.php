<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-02-28
 * Time: 15:10
 */
namespace Controller;

use App\Src\Request\Request;
use Controller\ControllerBase;
use App\Src\App;

class CityController extends ControllerBase
{
    public function __construct(App $app) {
        parent::__construct($app);
    }

    public function citiesHandler(Request $request) {
        $cities = $this->app->getService('cityFinder')->findAll();
        return $this->render('cities', ["cities" => $cities]);
    }

    public function cityHandler(Request $request, $id) {
        if(!$id) { // On vérifie si on a bien les informations
            $this->render('404'); // On affiche la page 404 si il n'y  a pas ce que l'on veut
        }
        $city = $this->app->getService('cityFinder')->findOneById($id); // Récupération des cities
        return $this->render('city', ['city' => $city]); // Envoi de la ville choisie
    }
}