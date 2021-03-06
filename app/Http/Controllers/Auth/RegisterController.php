<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

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
    //  * Where to redirect users after registration.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
    //  * @return void
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
            'lastname' => ['required', 'string', 'max:100', 'unique:users'],
            'firstname' => ['required', 'string', 'max:100', 'unique:users'],
            'middlename' => ['required', 'string', 'max:100','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required', 
                'string',  
                'confirmed',
                'min(8)',
                Password::min(8)
                ->MixedCase()
                ->letters()
                ->numbers()
                ->uncompromised(),
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'lastname' => $data['lastname'],
    //         'firstname' => $data['firstname'],
    //         'middlename' => $data['middlename'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    function register(Request $request){
        $request->validate([
            'lastname' => ['required', 'string', 'max:100',],
            'firstname' => ['required', 'string', 'max:100',],
            'middlename' => ['required', 'string', 'max:100',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8', 
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->MixedCase()
                    ->uncompromised()
            ],
        ]);

        // Makr Avatar

        $path = 'users/images/';
        $fontPath = public_path('fonts/Oliciy.ttf');
        $char = strtoupper($request->lastname[0]);
        $newAvatarName = rand(12,34353).time().'_avatar.png';
        $dest = $path.$newAvatarName;

        $createAvatar = makeAvatar($fontPath,$dest,$char);
        $picture = $createAvatar == true ? $newAvatarName : '';


        $user = new User();
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->email  = $request->email ;
        $user->picture  = $picture ;
        $user->role = 2;
        $user->password = \Hash::make($request->password);

        if($user ->save()){
            return redirect()->back()->with('success', 'You are now successfully registered');
        }else{
            return redirect()->back()->with('error', 'Failed to register');
        }
    }
}
