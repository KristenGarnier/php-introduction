<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-05
 * Time: 16:23
 */

require_once __DIR__ . '/route/route.php';

class App
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    /**
     * @var array
     */
    private $routes = array();

    /**
     * @var statusCode
     */
    private $statusCode;

    public function get($pattern, $callable) {
        $this->registerRoute(self::GET, $pattern, $callable);

        return $this;
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'] ?? self::GET;
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        foreach ($this->routes as $route) {
            if($route->match($method, $uri)) {
                return $this->process($route);
            }
        }

        throw new HttpException(404, "Page not found");
    }

    private function process(Route $route) {
        try {
            http_response_code($this->statusCode);
            echo call_user_func_array($route->getCallable(), $route->getArguments());
        } catch (HttpException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new HttpException(500, null, $e);
        }
    }

    /**
     * @param string   $method
     * @param string   $pattern
     * @param callable $callable
     */
    private function registerRoute($method, $pattern, $callable)
    {
        $this->routes[] = new Route($method, $pattern, $callable);
    }
}