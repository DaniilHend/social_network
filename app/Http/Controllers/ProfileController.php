<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageDeleteRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Messages;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function stranger($data) {
        if (Auth::id() == $data) {
            return redirect()->route('profile')->with('owner_id', Auth::id());
        }
        dd($data);
    }

    public function me() {
        $user = Auth::user();
        $comments = Messages::all()->where('profile_id', Auth::id());
        return view('profile')->with('login', true)->with('name', $user->login)->with('comments', $comments->sortByDesc('id')->forPage(0, 5));
    }

    public function createComment(MessageCreateRequest $data) {
        $comment = new Messages;
        $comment->title = $data->input('title');
        $comment->message = $data->input('message');
        $comment->user_id = Auth::id();
        $comment->profile_id = Auth::id();
        $comment->save();
        return redirect()->route('profile')->with('owner_id', Auth::id());
    }

    public function deleteComment(MessageDeleteRequest $data) {
        $comment = new Messages;
        $comment->where('id', $data->commentId)->delete();
        return redirect()->back();
    }

    public function allUsers() {
        $profiles = Users::all();
        return view('list')->with('profiles', $profiles);
    }

    public function allComments() {
        if (Auth::check() !== true) {
            return redirect()->route('form');
        }
        $comments = Messages::all()->where('user_id', Auth::id());
        return view('list')->with('comments', $comments->sortByDesc('id'));
    }
}
