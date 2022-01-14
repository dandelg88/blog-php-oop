<?php

if (! function_exists('url')) {
    /**
     * @param string $path
     * @return string
     */
    function url(string $path = ""): string
    {
        return $path !== '/' ? ROOT_URL . $path : ROOT_URL;
    }
}

if (! function_exists('asset')) {
    /**
     * @param string $path
     * @return string
     */
    function asset(string $path): string
    {
        return url($path);
    }
}

if (! function_exists('clear_errors')) {
    /**
     * @return void
     */
    function clear_errors(): void
    {
        unset($_SESSION['errors']);
    }
}

if (! function_exists('clear_session_msg')) {
    /**
     * @return void
     */
    function clear_session_msg(): void
    {
        unset($_SESSION['msg']);
    }
}
