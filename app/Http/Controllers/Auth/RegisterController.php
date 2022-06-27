<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'surname'=>['required','string'],
            'date_of_birth'=>['required','date']
        ],[
            'name.required' =>"Inserire il tuo Nome ",

            'email.required' =>"Inserire La tua Email ",
            'email.max'=>"Il nome no può essere più di :max",
            'email.unique'=>"Email e già registrata",
            'password.confirmed'=>"La tua password non è esatta",
            'password.required'=>"Inserisci la tua Password",
            'password.min'=>"La password deve essere lungo minimo 8 caratteri",
            'password_confirmation.confirmed'=>"La password non è uguale",
            'surname.required'=>"Inserisci il tuo Cognome",
            'surname.unique'=>"questo username e già stato preso",
            'date_of_birth.date'=>"Inserisci la data di nascita",
            'date_of_birth.required'=>"Inserisci la data di nascita",

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surname' => $data['surname'],
            'date_of_birth' => $data['date_of_birth'],


        ]);
    }
}
