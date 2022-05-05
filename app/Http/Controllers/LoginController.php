<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LoginRepository;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    public $loginRepo;

    public function __construct(LoginRepository $loginRepo)
    {
        $this->loginRepo = $loginRepo;

    }
    public function registerView(){

        return view('pages.register');
    }

    public function loginView(){
        return view('pages.login');
    }

    public function userView(){
        return view('pages.adminview');
    }

    public function register(RegisterRequest $request)
    {

        try {

        $this->loginRepo->registerUser($request);
        return view('pages.login');

        }catch (\Exception $e) {

            return redirect()->route('admin.registerview');
        }

    }


    public function customLogin(LoginRequest $request)
    {

        $data = $request->only('email','password');
        if(Auth::attempt($data)) {

            return redirect()->route('user.userview');
        }
        else
        {
            return view('pages.login');
        }
    }


    public function redirectToProvider($driver)
    {
        try {

            return Socialite::driver($driver)->redirect();
        }
        catch (\Exception $e) {

            return redirect()->route('admin.loginpage');
        }

    }


    public function handleProviderCallback($driver)
    {
        try {

            $user = Socialite::driver($driver)->user();
            $this->loginRepo->loginCheck($user,$driver);
            return redirect()->route('user.userview');
        }
        catch (\Exception $e) {

            return redirect()->route('admin.loginpage');
        }

    }


}

