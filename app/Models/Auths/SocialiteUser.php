<?php

namespace App\Models\Auths;

use App\Aika\Contracts\SocialiteUsersInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class SocialiteUser extends Authenticatable implements SocialiteUsersInterface
{
    use Notifiable, HasRoles;

    protected $table = 'socialite_users';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'provider_id', 'fullname', 'fname', 'mname', 'lname', 'photo', 'email', 'username', 'provider', 'status', 'token', 'secret',
        'password',
    ];

    /**
     * @var array $hidden
     */
    protected $hidden = [
        'token', 'secret', 'provider_id', 'email', 'password'
    ];

    /**
     * @var string $guard
     */
    protected $guard = "socialite";

    /**
     * @param $providerId integer
     * @param array $data
     * @return mixed
     */
    public static function findOrCreate($providerId, array $data = [])
    {
        $provider = parent::whereProviderId($providerId)->first();
        if ($provider) {
            foreach ($data as $key => $value) {
                if ($provider->$key == $key) {
                    $provider->$key = $value;
                }
            }
            $provider->save();

            return $provider;
        }

        return parent::create($data);
    }

    public function findOrFail($id)
    {
        $user = parent::whereId($id)->first();

        return $user == true ? $user : false;
    }
}
