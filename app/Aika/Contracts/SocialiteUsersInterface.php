<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/25/2018
 * Time: 8:01 AM
 */

namespace App\Aika\Contracts;


interface SocialiteUsersInterface
{
    public function findOrFail($id);
}