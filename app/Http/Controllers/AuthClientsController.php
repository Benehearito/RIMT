<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthClientsController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Registration & Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles the registration of new users, as well as the
     | authentication of existing users. By default, this controller uses
     | a simple trait to add these behaviors. Why don't you explore it?
     |
     */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     *
     * protected $redirectTo = '/';
     */


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'cliente',
            'registration_token' => str_random(40),

        ]);

        $url= route('confirmation',['token' => $user->registration_token]);

        Mail::send('auth/emails/registration',compact('user', 'url'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Activa tu cuenta');
        });

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //Auth::login($this->create($request->all()));
        $this->create($request->all());

        return redirect()->route('login')
            ->with('alert', 'Por favor confirma tu email: '. $request->email);
    }




    protected function  getConfirmation ($token)
    {
        $user = User::where('registration_token', $token)->first();
        if ($user === null) {
            return redirect()->route('login')
                ->with('alert', 'Este Email ya esta verificado, ahora pusedes iniciar sesión! ');
        }
        $user->registration_token = null;
        $user->save();
        return redirect()->route('login')
            ->with('alert', 'Email confirmado, ahora puedes iniciar sesión! ');

    }

    protected function  getCredentials ($request)
    {
        return [
            'email'                 => $request->get('email'),
            'password'              => $request->get('password'),
            'registration_token'    => null
        ];

    }



    public function redirectPath()
    {
        return route('home');
    }
}
