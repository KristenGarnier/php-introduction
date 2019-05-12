<?php

namespace App;

/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-05
 * Time: 16:50
 */

use Controller\CityController;
use App\Src\App;

class Routing {
    /**
     * @var App
     */
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function setup() {
        $city = new CityController($this->app);

        $this->app->get('/', [$city, 'citiesHandler']);
        $this->app->get('/city/(\d+)', [$city, 'cityHandler']);
    }
}