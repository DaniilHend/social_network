<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Users;

class UserController extends Controller {
    public function sign(UserRequest $data) {
        $UserModel = new Users();

        $UserModel->login = $data->input('login');
        $UserModel->password_hash = $data->input('password');

        $UserModel->save();

        return redirect()->route('profile');
    }
}
