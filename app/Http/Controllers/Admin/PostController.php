<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Models\Post;
use App\Domain\Models\Tag;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;

/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller
{
    /**
     * Index de todos los Posts.
     *
     * @return mixed
     */
    public function index()
    {
        $this->isAdmin();

        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.posts.index', compact('posts'));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $this->isAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.posts.create', compact('tags'));
    }

    /**
     * @return void
     */
    public function store(): void
    {
        $this->isAdmin();

        $post = new Post($this->getDB());
        $tags = $_POST['tags'];
        unset($_POST['tags']);

        if ($post->create($_POST, $tags)) {
            header('Location: /admin/posts');
        }
    }

    /**
     * @param int $id
     * @return mixed
     * @throws NotFoundException
     */
    public function edit(int $id)
    {
        $this->isAdmin();

        $post = (new Post($this->getDB()))->findById($id);

        if ($post) {
            $tags = (new Tag($this->getDB()))->all();

            return $this->view('admin.posts.edit', compact(['tags', 'post']));
        }

        throw new NotFoundException('Recurso no encontrado en la DB');
    }

    /**
     *
     * @return void
     * @throws NotFoundException
     */
    public function update()
    {
        $this->isAdmin();

        $post = (new Post($this->getDB()))->findById($_POST['id']);
        $tags = $_POST['tags'];
        unset($_POST['tags']);

        if ($post) {
            if ($post->update($_POST, $tags)) {
                header('Location: /admin/posts');
                return;
            }
        }

        throw new NotFoundException('Recurso no encontrado en la DB');
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $this->isAdmin();

        $post = (new Post($this->getDB()))->findById($_POST['id']);

        if ($post->destroy()) {
            header('Location: /admin/posts');
        }
    }
}
