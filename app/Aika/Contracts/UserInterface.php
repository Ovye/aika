<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/22/2018
 * Time: 8:16 AM
 */

namespace App\Aika\Contracts;


interface UserInterface
{
    public function findOrFail($userId);
    public function create(array $data);
}