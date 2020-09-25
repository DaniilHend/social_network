<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageDeleteRequest;
use App\Models\Messages;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile($data) {
        if (Auth::id() == $data) {
            return redirect()->route('profile');
        }
        $user = Users::all()->where('id', $data)->first();
        $userId = $user->id;
        $userName = $user->login;
        if (Auth::id()) {
            $sessionUserId = Auth::id();
        }
        $comments = Messages::all()->where('profile_id', $userId)->sortByDesc('id')->forPage(0, 5);

        return view('profile')->with('name', $userName)->with('userId', $userId)->with('sessionUserId', $sessionUserId)->with('comments', $comments);
    }

    public function myProfile() {
        $userId = Auth::id(); //userId - id профиля пользователя
        $userName = Auth::user()->login; //userName - login профиля пользователя
        $sessionUserId = Auth::id(); //sessionUserId - id человека, который просматривает профиль
        $comments = Messages::all()->where('profile_id', $userId)->sortByDesc('id')->forPage(0, 5);

        return view('profile')->with('name', $userName)->with('userId', $userId)->with('sessionUserId', $sessionUserId)->with('comments', $comments);
    }

    public function createComment(MessageCreateRequest $data) {
        $comment = new Messages;
        $comment->title = $data->input('title');
        $comment->message = $data->input('message');
        $comment->user_id = Auth::id();
        $comment->profile_id = $data->input('profile_id');
        $comment->save();

        return redirect()->back();
    }

    public function deleteComment(MessageDeleteRequest $data) {
        if (is_array($data->commentId)) {
            foreach ($data->commentId as $commentId) {
                DB::table('messages')->where('id', $commentId)->delete();
            }
        } else {
            DB::table('messages')->where('id', $data->commentId)->delete();
        }

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

    public function comments(Request $request) {
            $comments = Messages::all()->where('profile_id', $request->userId)->sortByDesc('id')->skip( 5);

            return view('includes.message', ['comments' => $comments, 'userId' => $request->userId, 'sessionUserId' => Auth::id()]);
    }
}
