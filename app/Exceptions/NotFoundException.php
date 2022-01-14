<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * @package Exceptions
 */
class NotFoundException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Genera la vista para el error 404.
     *
     * @return mixed
     */
    public function error404()
    {
        http_response_code(404);

        return require VIEWS_FOLDER . 'errors/404.view.php';
    }
}
