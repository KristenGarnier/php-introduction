<?php
class ContollerBase
{
    protected $model; // protected donne le doit aux enfants de la classe de gérer ce pramètre

    public function __construct($model) {
        $this->model = $model;
    }

    protected function render($template, $params = []) { // Pareil pour cette fonction
        if($template === '404') {
            header("HTTP/1.0 404 Not Found");
        }

        ob_start();
        include __DIR__ . '/../view/'. $template . '.php';
        ob_end_flush();
        die;
    }
}