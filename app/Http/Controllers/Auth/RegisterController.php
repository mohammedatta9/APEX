<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register;
use App\Models\User_type;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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

    public function index($type)
    {
        $type = User_type::where('name', $type)->where('status', 1)->first();
        if (!$type) {
            return redirect()->route('register');
        }
        return view('auth.register')->with('type', $type);
    }

    public function showForm()
    {
        $type = User_type::where('status', 1)->get();
        return view('auth.main_register')->with('types', $type);
    }

    protected function create(Register $register)
    {
        $email = $register['email'];
        list($username, $domain) = explode('@', $email);

        if (checkdnsrr($domain, 'MX')) {

            $save = User::create([
                'first_name' => $register['first_name'],
                'last_name' => $register['last_name'],
                'slug' => str_slug($register['first_name'] . ' ' . $register['last_name'] . ' ' . rand(000000, 999999)),
                'email' => $register['email'],
                'type_id' => $register['type'],
                'status' => 1,
                'password' => Hash::make($register['password']),
            ]);
            if ($save) {
                notify()->success('Your account registered successfuly and will be reviewed soon');
                Auth::login($save);
                notify()->success('Signed in');
                $page= $register['page'];
                if( $page == ""){
                    return redirect('/');
                }else{ 
                    return redirect($page);
                }
               
            } else {
                notify()->error('Something wrong, please contact support');
                return redirect()->back()->withInput();

            }

        } else {
            notify()->error('Please enter a valid email address');
            return redirect()->back()->withInput();
        }

    }
}




































