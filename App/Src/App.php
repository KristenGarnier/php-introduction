<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-05
 * Time: 16:23
 */
namespace App\Src;

use App\Src\Request\Request;
use App\Src\Response\Response;
use App\Src\ServiceContainer\ServiceContainer;
use App\Src\Route\Route;

class App
{

    /**
     * @var array
     */
    private $routes = array();

    /**
     * @var ServiceContainer
     */
    private $serviceContainer;

    /**
     * @return Mixed
     *
     * @param String $serviceName Name of the service to retrieve
     */
    public function getService(string $serviceName)
    {
        return $this->serviceContainer->get($serviceName);
    }

    /**
     * @param String $serviceName Name of the service to retrieve
     * @param Mixed $assigned Value / function / class stored in the service
     */
    public function setService(string $serviceName, $assigned)
    {
        $this->serviceContainer->set($serviceName, $assigned);
    }

    /**
     * @var statusCode
     */
    private $statusCode;

    public function __construct(ServiceContainer $serviceContainer) {
        $this->serviceContainer = $serviceContainer;
    }

    public function get($pattern, $callable) {
        $this->registerRoute(Request::GET, $pattern, $callable);

        return $this;
    }

    public function run(Request $request = null) {
        if($request === null) {
            $request = Request::createFromGlobals();
        }
        $method = $request->getMethod();
        $uri = $request->getUri();

        foreach ($this->routes as $route) {
            if($route->match($method, $uri)) {
                return $this->process($route, $request);
            }
        }

        throw new \Exception(404, "Page not found");
    }

    private function process(Route $route, Request $request) {
        try {
            $arguments = $route->getArguments();
            array_unshift($arguments, $request);
            $content = call_user_func_array($route->getCallable(), $arguments);

            if($content instanceof Response) {
                $content->send();
                return;
            }

            $response = new Response($content, $this->statusCode);
            $response->send();

        } catch (\Exception $e) {
            throw $e;
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