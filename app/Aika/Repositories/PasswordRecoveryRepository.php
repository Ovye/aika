<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/22/2018
 * Time: 7:35 AM
 */

namespace App\Aika\Repositories;


use App\Aika\Contracts\PasswordRecoveryInterface;
use App\Models\Auths\PasswordRecovery;

class PasswordRecoveryRepository implements PasswordRecoveryInterface
{
    public $recovery;

    public function __construct(PasswordRecovery $recovery)
    {
        $this->recovery = $recovery;
    }

    public function getUserRecovery($userId)
    {
        return $this->recovery->where('user_id', $userId)->first();
    }

    public function createOrUpdateUserRecovery($userId, array $data = [])
    {
        $userRecovery = $this->recovery::whereUserId($userId)->first();
        if ($userRecovery) {
            foreach ($data as $key => $value) {
                if ($key != 'code_request_times') {
                    $userRecovery->$key = $value;
                }
            }

            $userRecovery->save();

            return $userRecovery;
        }

        return $this->recovery::create($data);
    }
}