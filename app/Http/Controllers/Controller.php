<?php

namespace App\Http\Controllers;

use App\Domain\Database\DBConnection;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller
{
    /**
     * @var DBConnection
     */
    protected $db;

    /**
     * @param DBConnection $db
     */
    public function __construct(DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    /**
     * @return DBConnection
     */
    protected function getDB(): DBConnection
    {
        return $this->db;
    }

    /**
     * Genera la vista correspondiente que se desea mostrar al cliente.
     *
     * @param string $view
     * @param array|null $params
     * @return mixed
     */
    protected function view(string $view, array $params = null)
    {
        ob_start();
        $viewPath = str_replace('.', '/', $view);
        require VIEWS_FOLDER . $viewPath . '.view.php';
        $content = ob_get_clean();
        return require VIEWS_FOLDER . 'layout.view.php';
    }

    /**
     * @return bool|void
     */
    protected function isAdmin()
    {
        if (
            isset($_SESSION['auth'])
            && $_SESSION['auth'] === 1
        ) {
            return true;
        }

        header('Location: /login');
    }
}
