<?php

namespace App\Http\Router;

use App\Domain\Database\DBConnection;
use App\Http\Request;

/**
 * Class Route
 * @package App\Http\Router
 */
class Route
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $action;

    /**
     * @var array
     */
    private $matches;

    /**
     * @param string $path
     * @param string $action
     */
    public function __construct(string $path, string $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    /**
     * @param string $url
     * @return bool
     */
    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

        if (preg_match("#^$path$#", $url, $matches)) {
            $this->matches = $matches;

            return true;
        }

        return false;
    }

    /**
     * @param array|null $superGlobals
     * @return mixed
     */
    public function execute(?array $superGlobals = null)
    {
        $request = new Request($superGlobals);
        $params = explode('@', $this->action);
        $controller = new $params[0](new DBConnection(DB_NAME, DB_HOST, DB_USER, DB_PWD));
        $action = $params[1];

        return isset($this->matches[1]) ? $controller->$action($this->matches[1]) : $controller->$action();
    }
}
