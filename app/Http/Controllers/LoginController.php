<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    function login()
    {
        return view('login');
    }
    function loginAdmin()
    {
        return view('loginAdmin');
    }

    function loginAjax()
    {
        $email = request('email');
        $username = request('username');
        $pwd = request('password');

        if (isset($username)) {
            $model = Admin::where('username', $username)->first();
            if ($model != null) {
                if (Hash::check($pwd, $model->password, [])) {
                    session()->put('admin', $model);
                    session()->save();
                    echo 'true||Connexion effectuée!';
                    exit;
                }else{
                    echo 'false||Identifants incorrects !';
                    exit;
                }
                
            }
            echo 'false||Utilisateur inconnu';
            exit;
        } else {
            $model = User::where('email', $email)->first();
            $deleted = User::where('deleted');
            if ($model != null) {
                if (Hash::check($pwd, $model->password, [] && $deleted ==0)) {
                    session()->put('user', $model);
                    session()->save();
                    echo 'true||Connexion effectuée !';
                    exit;
                }
                echo 'false||Identifiants incorrects';
                exit;
            }
            echo 'false||Utilisateur inconnu';
            exit;
        }
    }
}
