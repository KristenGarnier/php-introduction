<?php
require_once __DIR__ . '/../database/db.php';
require_once __DIR__ . '/src/app.php';
require_once __DIR__ . '/routing.php';

$app = new App();
$routing = new Routing($app);
$routing->setup();

return $app;