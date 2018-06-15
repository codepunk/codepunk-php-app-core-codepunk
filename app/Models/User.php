<?php

namespace App\Models;

use Codepunk\Activatinator\Activable;
use Codepunk\Activatinator\Contracts\Activable as ActivableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
    implements ActivableContract
{
    use Notifiable, Activable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
