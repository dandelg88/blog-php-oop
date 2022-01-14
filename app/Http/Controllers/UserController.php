<?php

namespace App\Http\Controllers;

use App\Domain\Models\User;
use App\Utils\Validator;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return void
     */
    public function login()
    {
        return require VIEWS_FOLDER . 'auth/login.view.php';
    }

    /**
     * @return void
     */
    public function signin()
    {
        $validator = new Validator($_POST);

        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'] = $errors;

            header('Location: /login');

            return;
        }

        $user = (new User($this->getDB()))->findByUsername($_POST['username']);

        if ($user) {
            if (password_verify($_POST['password'], $user->password)) {
                $_SESSION['auth'] = $user->is_admin;
                $_SESSION['msg']['success'] = '¡Bienvenido, '.strtoupper($user->username).'!';

                header('Location: /admin/posts');

                return;
            }
            $_SESSION['errors']['password'][] = 'Contraseña incorrecta.';

            header('Location: /login');

            return;
        }

        $_SESSION['errors']['username'][] = 'El usuario no exite.';

        header('Location: /login');
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /');
    }
}
