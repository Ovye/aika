<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/24/2018
 * Time: 10:38 PM
 */

namespace App\Aika\Repositories;


use App\Aika\Contracts\UsersInterface;
use App\User;

class UsersRepository implements UsersInterface
{

    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function nonAdmins()
    {
        $users = [];
        foreach ($this->users::all() as $user) {
            if (!$user->hasRole(['admin'])) {
                array_push($users, $user);
            }
        }

        return $users;
    }

    public function onlyAdmins()
    {
        $users = [];
        foreach ($this->users::all() as $user) {
            if ($user->hasRole(['admin'])) {
                array_push($users, $user);
            }
        }

        return $users;
    }

    public function filter()
    {
        return $this->users;
    }

}