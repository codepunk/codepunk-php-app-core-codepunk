<?php

namespace App\Models;

use Codepunk\Activatinator\Activable;
use Codepunk\Activatinator\Contracts\Activable as ActivableContract;
use Codepunk\Activatinator\Traits\ValidatesForPassport;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class User extends Authenticatable
    implements ActivableContract
{
    use Notifiable, Activable, HasApiTokens, ValidatesForPassport;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'given_name', 'family_name', 'password',
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
