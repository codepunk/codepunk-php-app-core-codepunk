<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Codepunk\Activatinator\ActivatesUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, ActivatesUsers {
        ActivatesUsers::showLoginForm insteadof AuthenticatesUsers;
        ActivatesUsers::authenticated insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request. This will examine the value entered into
     * 'username_or_email' and attempt to validate based on whether an email or a username was entered.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $input = $request->input($this->username());
        $field = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $input]);
        return $request->only($field, 'password');
    }

    /**
     * Get name of the field to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username_or_email';
    }
}
