<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/24/2018
 * Time: 10:34 PM
 */

namespace App\Aika\Contracts;


interface UsersInterface
{
    public function nonAdmins();
    public function onlyAdmins();
    public function find($id);
}