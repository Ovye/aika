<?php

namespace App;

use App\Aika\Contracts\UsersInterface;
use App\Models\Auths\UserVerifications;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements UsersInterface
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'fname', 'lname', 'fullname', 'phone', 'mname', 'photo', 'social_credentials'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guard = 'web';

    public static function findOrFail($userId)
    {
        $user = parent::whereId($userId)->first();

        return $user == true ? $user : false;
    }

    public function verification()
    {
        return $this->hasOne(UserVerifications::class, 'user_id');
    }

    public function nonAdmins()
    {
        $users = [];
        foreach ($this::all() as $user) {
            if (!$user->hasRole(['admin'])) {
                array_push($users, $user);
            }
        }

        return $users;
    }

    public function onlyAdmins()
    {
        $users = [];
        foreach ($this::all() as $user) {
            if ($user->hasRole(['admin'])) {
                array_push($users, $user);
            }
        }

        return $users;
    }

    public function find($id)
    {
        $user = parent::whereId($id)->first();

        return $user == true ? $user : false;
    }
}
