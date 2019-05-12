<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-02-28
 * Time: 14:59
 */
namespace Controller;

use App\Src\App;
use App\Src\Response\Response;

abstract class ControllerBase
{
    protected $app;

    public function __construct(App $app) {
        $this->app = $app;
    }

    protected function render(String $template, Array $params = []) {
        ob_start();
        include __DIR__ . '/../View/' . $template . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        if($template === '404') {
            $response = new Response($content, '404', ['HTTP/1.0 404 Not Found']);
            return $response;
        }

        return $content;
    }
}