<?php

use App\Exceptions\NotFoundException;
use App\Http\Router\Router;

// Autoload de Composer
require_once '../vendor/autoload.php';

// Ruta de la carpeta con las vistas
define('VIEWS_FOLDER', dirname(__DIR__) . '/views/');

// Ruta URL raiz de la aplicación
$root_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") ? "https" : "http");
$root_url .= "://".$_SERVER['HTTP_HOST'];
$root_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"", $_SERVER['SCRIPT_NAME']);
define("ROOT_URL", $root_url);

// Datos de configuración de la DB
const DB_NAME = 'my_blog';
const DB_HOST = '127.0.0.1';
const DB_USER = 'root';
const DB_PWD = '';

// Configuracion inicial del Router y las rutas web disponibles
$router = new Router($_GET['url']);

// Rutas públicas
$router->get('/', 'App\Http\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Http\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Http\Controllers\BlogController@show');
$router->get('/tags/:id', 'App\Http\Controllers\BlogController@tag');

// Rutas auth
$router->get('/login', 'App\Http\Controllers\UserController@login');
$router->post('/login', 'App\Http\Controllers\UserController@signin');
$router->get('/logout', 'App\Http\Controllers\UserController@logout');

// Rutas de administrador
$router->get('/admin/posts', 'App\Http\Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'App\Http\Controllers\Admin\PostController@create');
$router->post('/admin/posts/store', 'App\Http\Controllers\Admin\PostController@store');
$router->get('/admin/posts/edit/:id', 'App\Http\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/update', 'App\Http\Controllers\Admin\PostController@update');
$router->post('/admin/posts/delete', 'App\Http\Controllers\Admin\PostController@delete');

// Respuesta a la URI requerida por el cliente
try {
    $router->run();
} catch (NotFoundException $e) {
    $e->error404();
}
