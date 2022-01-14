<?php

namespace App\Http\Controllers;

use App\Domain\Models\Post;
use App\Domain\Models\Tag;
use App\Exceptions\NotFoundException;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * Página principal.
     *
     * @return mixed
     */
    public function welcome()
    {
        return $this->view('blog.welcome');
    }

    /**
     * Index de todos los Posts.
     *
     * @return mixed
     */
    public function index()
    {
        $posts = (new Post($this->getDB()))->all();

        return $this->view('blog.index', compact('posts'));
    }

    /**
     * Mostrar un Post en especifico.
     *
     * @param int $id
     * @return mixed
     * @throws NotFoundException
     */
    public function show(int $id)
    {
        $post = (new Post($this->getDB()))->findById($id);

        if ($post) {
            return $this->view('blog.show', compact('post'));
        }

        throw new NotFoundException('Recurso no encontrado en la DB');
    }

    /**
     * Mostrar los posts asociados a una etiqueta (TAG) en especifico.
     *
     * @param int $id
     * @return mixed
     * @throws NotFoundException
     */
    public function tag(int $id)
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        if ($tag) {
            return $this->view('blog.tag', compact('tag'));
        }

        throw new NotFoundException('Recurso no encontrado en la DB');
    }
}
