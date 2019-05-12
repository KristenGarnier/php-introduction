<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-22
 * Time: 10:13
 */
namespace App\Src\Request;

class Request
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    /**
     * @var array
     */
    private $parameters;

    public function __construct(array $query = [], array $request = []) {
        $this->parameters = array_merge($query, $request);
    }

    public static function createFromGlobals() {
        return new self($_GET, $_POST);
    }

    public function getParameters($name) {
        return $this->parameters[$name];
    }

    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'] ?? self::GET;
    }

    public function getUri() {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        if ($pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        return $uri;
    }
}