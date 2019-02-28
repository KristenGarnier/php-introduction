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
}