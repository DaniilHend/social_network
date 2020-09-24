<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessagesRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Messages;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function stranger($data) {
        dd($data);
    }

    public function me() {
        $user = Auth::user();
        $comments = Messages::all()->where('profile_id', Auth::id());
        return view('profile')->with('name', $user->login)->with('comments', $comments->sortByDesc('id')->forPage(0, 5));
    }

    public function comment(MessagesRequest $data) {
        if ($data->input('title') && $data->input('message')) {
            $comment = new Messages;
            $comment->title = $data->input('title');
            $comment->message = $data->input('message');
            $comment->user_id = Auth::id();
            $comment->profile_id = Auth::id();
            $comment->save();
        }
        return redirect()->route('profile')->with('owner_id', Auth::id());
    }

    public function all() {
        $profiles = Users::all();
        dd($profiles);
    }
}
