<?php

namespace App\Http\Traits;

/**
 * Trait FindsForPassport
 * @package App\Http\Traits
 * @mixin \Illuminate\Database\Query\Builder
 */

trait FindsForPassport
{
    public function findForPassport($usernameOrEmail)
    {
        $is_email = filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL) != false;
        return $is_email ?
            $this->where('email', $usernameOrEmail)->first() :
            $this->where('username', $usernameOrEmail)->first();
    }
}
