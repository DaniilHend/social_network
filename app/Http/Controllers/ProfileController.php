<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function stranger($data) {
        dd($data);
    }

    public function me() {
        $login = Auth::user()->login;
        return view('profile')->with('name', $login);
    }
}
