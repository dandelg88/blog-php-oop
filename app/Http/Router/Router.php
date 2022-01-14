<?php

namespace App\Http\Router;

use App\Exceptions\NotFoundException;

/**
 * Class Router
 * @package App\Http\Router
 */
class Router
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $routes;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = trim($url, '/');
    }

    /**
     * @param string $path
     * @param string $action
     * @return void
     */
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    /**
     * @param string $path
     * @param string $action
     * @return void
     */
    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    /**
     * @return void
     * @throws NotFoundException
     */
    public function run()
    {
        $superGlobals = [
            'GET' => $_GET,
            'POST' => $_POST
        ];

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute($superGlobals);
            }
        }

        throw new NotFoundException('404 - Página no encotrada');
    }
}
