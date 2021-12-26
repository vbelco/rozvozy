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

        $user = User::where('customers_email_address','=', $request->email)->get()->first(); //skusime najst uzivatela

        if ($user){
            //if ($this->tep_validate_password($request->password, $user->customers_password)){

            if (User::tep_validate_password($request->password, $user->customers_password)){
                //dd($request);
                $is_ok = true;
            }
        }

        if ( $is_ok ) {
            //pridame si meno do triedy uzivatela
            $user->name = $user->customers_firstname." ".$user->customers_lastname;
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('home'); //presmerovanie tam odkial si prisiel
        }

        return back()->withErrors([
            'customers_email_address' => 'Uvedene udaje nie su spravne.',
       ]);
    }

    //login formular na prihlasenie
    public function login(){
        return view('auth.login');
    }

    //registracny formular na vytvoprenie uzivatela
    public function create(){
        return view('auth.create');
    }

    //vlozenie uzivatela db DB
    public function store(Request $request){
      //kontrola vstupneho formulara
      $this->validate($request, [
        'name' => 'required',
        'street' => 'required',
        'psc' => 'required',
        'city' => 'required',
        'street' => 'required',
        'email' => 'required|email|unique:customers,customers_email_address',
        'telephone' => 'required',
        'password' => 'min:6|required_with:password2|same:password2',
        'password2' => 'min:6',
     ]);

      $rozdelene_meno = explode (" ", $request->name, 2);
      $input_customer['customers_firstname'] = $rozdelene_meno[0];
      $input_customer['customers_lastname'] = $rozdelene_meno[1];
      $input_customer['customers_email_address'] = $request->email;
      $input_customer['customers_telephone'] = $request->telephone;
      $input_customer['customers_password'] = User::tep_encrypt_password($request->password);

      $input_address['entry_firstname'] = $rozdelene_meno[0];
      $input_address['entry_lastname'] = $rozdelene_meno[1];
      $input_address['entry_street_address'] = $request->street;
      $input_address['entry_postcode'] = $request->psc;
      $input_address['entry_city'] = $request->city;

      $user = User::create($input_customer); //vytvorenie/vlozenie zakaznika
      $user->addressbooks()->create($input_address); //vytvorenie/vlozenie jeho adresy

      //este ulozenie id adresy do uzivatela
      $user->customers_default_address_id = $user->addressbooks()->latest()->first()->address_book_id;
      $user->save();

      Auth::login($user); //rovno prihlasenie zakaznika
      return redirect()->intended('home')->with('success','Zákazník bol úspešne vytvorený!');;
  }

    public function logout(){
        Auth::logout();
        return redirect()->intended('home');
    }

}
