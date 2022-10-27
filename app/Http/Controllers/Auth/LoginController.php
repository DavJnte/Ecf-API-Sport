<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    |gère l'authentification des utilisateurs pour l'application et
    |les rediriger vers l'écran d'accueil.
    |
    */

    use AuthenticatesUsers;

    /**
     * Redirection après l'authentification
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
        $this->middleware('guest')->except('logout');
    }
}
