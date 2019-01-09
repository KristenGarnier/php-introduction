<?php
include_once __DIR__ . '/contollerBase.php'; // On utilise include once ici, pour être sur de ne pas l'inclure deux fois dans le cas d'un site avec multiples controllers

class CountryController extends ContollerBase {
    public function __construct($model)
    {
        parent::__construct($model); // on initialise le parent
    }

    public function countriesHandler() {
        $cities = $this->model->getAll();

        $countries = []; // Will be used to contain all our countries
        foreach($cities as $city) {
            if(!in_array($city['country'], $countries)) { // Check if country does not already exists in array
                array_push($countries, $city['country']);
            }
        }

        $this->render('countries', ['countries' => $countries]); // on utilise la méthode render pour afficher le template et lui faire passer du contenu
    }

    public function countryHandler() {
        if(!key_exists('name', $_GET)) {
           $this->render('404');
        }

        $country = $_GET['name'];
        $cities = $this->model->getAll();

        if(!$this->doCountryExists($country, $cities, $country)) {
            $this->render('404');
        }

        $citiesFromCountry = []; // Will be used to contain all our countries
        foreach($cities as $city) {
            if( $city['country'] === $country ) { // Check if country does not already exists in array
                array_push($citiesFromCountry, $city);
            }
        }

        $this->render('country', ['countries' => $citiesFromCountry, 'country' => $country]);
    }

    private function doCountryExists($country, $cities, $name) {
        $result = false; // initialize result to false ==> Should stay that way if no country found
        foreach($cities as $city) {
            if( $city['country'] === $name ) { // Check if country does not already exists in array
                $result = true;
            }
        }

        return $result;
    }
}