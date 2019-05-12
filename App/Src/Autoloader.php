<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-06
 * Time: 09:22
 */
namespace App\Src;

class Autoloader{

    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){
        $nameSpace = explode('\\', $class);
        $class = implode('/', $nameSpace);
        require_once $_SERVER['DOCUMENT_ROOT'] . DS . $class.'.php';
    }

}