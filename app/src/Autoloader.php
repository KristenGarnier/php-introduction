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
        $nameSpace = array_map('strtolower', $nameSpace);
        $i = count($nameSpace) - 1;
        $nameSpace[$i] = ucfirst($nameSpace[$i]);
        $class = implode('/', $nameSpace);
        require_once '..' . DS . $class.'.php';
    }

}