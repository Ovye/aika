<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/22/2018
 * Time: 7:32 AM
 */

namespace App\Aika\Contracts;


interface PasswordRecoveryInterface
{
    public function getUserRecovery($recoveryUser);

    public function createOrUpdateUserRecovery($userId, array $data = []);
}