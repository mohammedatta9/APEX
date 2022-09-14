<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{



    public function index(){
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials , $request->remember)) {
            notify()->success('Signed in');
            return redirect()->intended('profile')
                ->withSuccess('Signed in');
        }
        notify()->error('There is an error in your data');
        return redirect("login")->withInput();
    }

// Google login
public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

// Google callback
public function handleGoogleCallback()
{
    $user = Socialite::driver('google')->stateless()->user();

    $this->_registerOrLoginUser($user);

    // Return home after login
    return redirect()->route('user.profile');
}

// Facebook login
public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}

// Facebook callback
public function handleFacebookCallback()
{
    $user = Socialite::driver('facebook')->user();

    $this->_registerOrLoginUser($user);

    // Return home after login
    return redirect()->route('user.profile');
}

// Github login
public function redirectToGithub()
{
    return Socialite::driver('github')->redirect();
}

// Github callback
public function handleGithubCallback()
{
    $user = Socialite::driver('github')->user();

    $this->_registerOrLoginUser($user);

    // Return home after login
    return redirect()->route('user.profile');
}

protected function _registerOrLoginUser($data)
{
    $user = User::where('email', '=', $data->email)->first();
    if (!$user) {
        $user = new User();
        $user->first_name = $data->name;
        $user->last_name = $data->name;
        $user->password = 123456;
        $user->email = $data->email;
        $user->type_id = 4;
         
        $user->save();
    }

    Auth::login($user);
}

}
