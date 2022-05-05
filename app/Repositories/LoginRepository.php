<?php

namespace App\Repositories;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginRepository
{

    public function loginCheck($user,$driver)
    {

            $existingUser = User::where('email', $user->getEmail())->first();
            $column=$this->getSocialDriverColumn($driver);

            if ($existingUser) {
                auth()->login($existingUser, true);
            }
            else {
                $newUser                    = new User;
                $newUser->{$column}         = $user->getId();
                $newUser->name              = $user->getName();
                $newUser->email             = $user->getEmail();
                $newUser->email_verified_at = now();
                $newUser->save();


                auth()->login($newUser, true);
            }

    }

    public function getSocialDriverColumn($driver){
        switch ($driver) {
            case 'google':
                    return 'google_id';
            case 'facebook':
                    return 'facebook_id';
            case 'linkedin':
                    return 'linkdin_id';
            default:
                throw new Exception('No Driver found');
        }
    }

    public function registerUser($request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    }

}
