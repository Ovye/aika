<?php

namespace App\Models\Auths;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserVerifications extends Model
{

    protected $fillable = [
      'user_id', 'phone', 'email', 'code', 'token', 'expired_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static function createOrUpdate(array $data)
    {
        $user = parent::whereUserId($data['user_id'])->first();
        if ($user) {
            foreach ($data as $key => $value) {
                if ($key == $user->$key) {
                    $user->$key = $value;
                }
            }
            $user->save();

            return $user;
        }

        return parent::create($data);
    }

    static function getByUserId($userId)
    {
        return parent::whereUserId($userId)->first();
    }

    static function getByToken($token)
    {
        return parent::whereToken($token)->first();
    }
}
