<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $is_ok = false;

        $user = User::where('user_name','=', $request->username)->get()->first(); //skusime najst uzivatela

        if ($user){

            if (User::tep_validate_password($request->password, $user->user_password)){
                //dd($request);
                $is_ok = true;
            }
        }

        if ( $is_ok ) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('welcome')); //presmerovanie tam odkial si prisiel
        }

        return back()->withErrors([
            'username' => 'Uvedene udaje nie su spravne.',
       ]);
    }

    //login formular na prihlasenie
    public function login(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended(route('welcome'));
    }

}
