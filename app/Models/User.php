<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gigya_id',
        'google_id',
        'facebook_id',
        'twitter_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isRetail()
    {
        if (!$this->gigya_id) {
            return false;
        }

        $apiUserSearch = app('App\Http\Controllers\API\APIController')->getAccountInfo($this->gigya_id);

        if (isset($apiUserSearch['response']) && isset($apiUserSearch['response']->data) && isset($apiUserSearch['response']->data->is_Retail)) {
            $this->assign('barista');
            return true;
        } else {
            $this->retract('barista');
            return false;
        }
    }
}
