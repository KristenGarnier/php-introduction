<?php
namespace App;

use App\Src\App;
use App\Src\ServiceContainer\ServiceContainer;
use Database\Database;
use Model\Finder\CityFinder;

$container = new ServiceContainer();
$app = new App($container);

$app->setService('database', new Database(
    getenv('MYSQL_ADDON_HOST'),
    getenv('MYSQL_ADDON_DB'),
    getenv('MYSQL_ADDON_USER'),
    getenv('MYSQL_ADDON_PASSWORD'),
    getenv('MYSQL_ADDON_PORT')
));

$app->setService('cityFinder', new CityFinder($app));

$routing = new Routing($app);
$routing->setup();

return $app;