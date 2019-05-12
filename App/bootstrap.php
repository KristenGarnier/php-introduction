<?php
namespace App;

use App\Src\App;
use App\Src\ServiceContainer\ServiceContainer;
use Database\Database;
use Model\Finder\CityFinder;

$container = new ServiceContainer();
$app = new App($container);

$app->setService('database', new Database(
    "127.0.0.1",
    "citytowns",
    "root",
    "root",
    "8889"
));

$app->setService('cityFinder', new CityFinder($app));

$routing = new Routing($app);
$routing->setup();

return $app;