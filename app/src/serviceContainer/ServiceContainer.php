<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-06
 * Time: 08:54
 */
namespace App\Src\ServiceContainer;

class ServiceContainer {
    private $container = array();

    public function get(string $serviceName){
        return $this->container[$serviceName];
    }

    public function set(string $name, $assigned) {
        $this->container[$name] = $assigned;
    }

    public function unset(string $name) {
        unset($this->container[$name]);
    }
}