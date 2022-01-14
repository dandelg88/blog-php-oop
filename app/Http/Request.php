<?php

namespace App\Http;

/**
 * Class Request
 * @package App\Http
 */
class Request
{
    /**
     * @var array|mixed
     */
    public $get;

    /**
     * @var array|mixed
     */
    public $post;

    /**
     * Request constructor.
     *
     * @param array $superGlobals
     */
    public function __construct(array $superGlobals)
    {
        $this->get = $superGlobals['GET'] ?? [];
        $this->post = $superGlobals['POST'] ?? [];
    }
}
