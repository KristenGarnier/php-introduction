<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-05
 * Time: 16:50
 */
require_once __DIR__ . '/../controller/CityController.php';
require_once __DIR__ . '/../controller/ControllerBase.php';
require_once __DIR__ . '/../model/cities.php';
require_once __DIR__ . '/../database/db.php';

class Routing {
    /**
     * @var App
     */
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function setup(){
        $this->app->get('/', function() {
            $city = new CityController(
                $this->setupModel('CityModel', $this->setupDatabase())
            );
            $city->citiesHandler();
        });

        $this->app->get('/city/(\d+)', function($id) {
            $city = new CityController(
                $this->setupModel('CityModel', $this->setupDatabase())
            );
            $city->cityHandler($id);
        });
    }

    private function setupDatabase() : Database {
        $Database = new Database(
            "127.0.0.1",
            "citytowns",
            "root",
            "root",
            "8889"
        );

        return $Database;
    }

    private function setupModel(String $modelName, Database $Database) {
        $model = new $modelName($Database);

        return $model;
    }
}