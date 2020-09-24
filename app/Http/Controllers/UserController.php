<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Str;

class UserController extends Controller
{
    public function sign(UserRequest $data)
    {
        $login = $data->input('login');
        $pass = $data->input('password');

        if (Auth::attempt(['login' => $login, 'password' => $pass])) {
            $user = Auth::user();

            $token = md5(Str::random(16));
            $user->remember_token = $token;
            $user->save();
            Auth::login($user, true);

            return redirect()->route('profile');
        }

        $UserModel = new Users();

        $UserModel->login = $login;
        $UserModel->password = Hash::make($pass);
        $token = md5(Str::random(16));
        $UserModel->remember_token = $token;
        $UserModel->save();

        Auth::attempt(['login' => $login, 'password' => $pass]);
        $user = Auth::user();
        Auth::login($user, true);

        return redirect()->route('profile');
    }

    public function form() {
        if (Auth::check() == true) {
            return redirect()->route('profile');
        }
        return view('welcome');
    }
}
