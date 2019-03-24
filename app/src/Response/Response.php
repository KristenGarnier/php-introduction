<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-23
 * Time: 08:19
 */
namespace App\Src\Response;

class Response
{
    private $content;

    private $statusCode;

    private $headers;

    /**
     * Response constructor.
     * @param $content
     * @param int $statusCode
     * @param array $headers
     */
    public function __construct($content, $statusCode = 200, array $headers = [])
    {
        $this->content    = $content;
        $this->statusCode = $statusCode;
        $this->headers    = array_merge([ 'Content-Type' => 'text/html' ], $headers);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function sendHeaders()
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $name => $value) {
            header(sprintf('%s: %s', $name, $value));
        }
    }

    public function send()
    {
        $this->sendHeaders();

        echo $this->content;
    }
}