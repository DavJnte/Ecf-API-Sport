<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | réinitialisation de mot de passe.
    |
    */

    use ResetsPasswords;

    /**
     * Redirection après le reset du mot de passe
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Créer un nouveau controleur
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
