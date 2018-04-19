<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/22/2018
 * Time: 8:10 AM
 */

namespace App\Aika\Repositories;


use App\Aika\Contracts\UserInterface;
use App\User;

class UserRepository implements UserInterface
{

    public function findOrFail($userId)
    {
        return User::whereId($userId)->first();
    }

    public function create(array $data)
    {
        return User::create($data);
    }
}