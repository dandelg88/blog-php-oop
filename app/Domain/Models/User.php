<?php

namespace App\Domain\Models;

/**
 * Class User
 * @package App\Domain\Models
 *
 * @property string $username
 * @property string $password
 * @property int $is_admin
 */
class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    public function findByUsername(string $username)
    {
        return $this->query("SELECT * FROM users WHERE username = ?", [$username], true);
    }
}
