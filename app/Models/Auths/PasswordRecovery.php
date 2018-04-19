<?php

namespace App\Models\Auths;

use Illuminate\Database\Eloquent\Model;

class PasswordRecovery extends Model
{

    protected $table = 'password_recovery';

    protected $fillable = [
      'user_id', 'code', 'token', 'status', 'recovery_type', 'code_request_times', 'expired_at'
    ];

    public static function createOrUpdate($userId, $data = [])
    {
        $userRecovery = parent::whereUserId($userId)->first();
        if ($userRecovery) {
            foreach ($data as $key => $value) {
                if ($key != 'code_request_times') {
                    $userRecovery->$key = $value;
                }
            }

            $userRecovery->save();

            return $userRecovery;
        }

        return parent::create($data);
    }

    public static function updateUserLog($userId, $data = [])
    {
        $userRecovery = parent::whereUserId($userId)->first();
        if ($userRecovery) {
            foreach ($data as $key => $value) {
                $userRecovery->$key = $value;
            }

            $userRecovery->save();

            return $userRecovery;
        }

        return false;
    }

    public static function getByUserId($userId)
    {
        $userRecovery = parent::whereUserId($userId)->first();
        if ($userRecovery) {
            return $userRecovery;
        }

        return false;
    }

}
