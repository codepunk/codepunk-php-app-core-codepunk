<?php

namespace App\Models;

use App\Http\Traits\FindsForPassport;
use Codepunk\Activatinator\Activable;
use Codepunk\Activatinator\Contracts\Activable as ActivableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class User extends Authenticatable
    implements ActivableContract
{
    use Notifiable, Activable, HasApiTokens, FindsForPassport;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'given_name', 'family_name','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
