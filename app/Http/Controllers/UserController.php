<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Str;

class UserController extends Controller {
    public function sign(UserRequest $data) {
        $login = $data->input('login');
        $pass = $data->input('password');

        if (Auth::attempt(['login' => $login, 'password' => $pass])) {
            $user = Auth::user();

            $token = md5(Str::random(16));
            $user->remember_token = $token;
            $user->save();

            return redirect()->route('profile')->with('data', $user);
        }

        $UserModel = new Users();

        $UserModel->login = $login;
        $UserModel->password = Hash::make($password);
        $UserModel->save();
        return redirect()->route('strange-profile', [$UserModel]);
    }
}
