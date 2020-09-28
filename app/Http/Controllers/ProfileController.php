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
        if (! $user) {
            return redirect()->route('form');
        }
        $userId = $user->id;
        $userName = $user->login;
        if (Auth::id()) {
            $sessionUserId = Auth::id();
        } else {
            $sessionUserId = null;
        }
        $comments = Messages::all()->where('profile_id', $userId)->where('message_id', null)->sortByDesc('id')->forPage(0, 5);
        $responces = Messages::all()->where('message_id', !null)->sortByDesc('id');

        return view('profile')->with('name', $userName)->with('userId', $userId)->with('sessionUserId', $sessionUserId)->with('comments', $comments)->with('responses', $responces);
    }

    public function myProfile() {
        $userId = Auth::id(); //userId - id профиля пользователя
        $userName = Auth::user()->login; //userName - login профиля пользователя
        $sessionUserId = Auth::id(); //sessionUserId - id человека, который просматривает профиль
        $comments = Messages::all()->where('profile_id', $userId)->where('message_id', null)->sortByDesc('id')->forPage(0, 5);
        $responces = Messages::all()->where('message_id', !null)->sortByDesc('id');

        return view('profile')->with('name', $userName)->with('userId', $userId)->with('sessionUserId', $sessionUserId)->with('comments', $comments)->with('responses', $responces);
    }

    public function createComment(MessageCreateRequest $data) {
        $comment = new Messages;
        $comment->title = $data->input('title');
        $comment->message = $data->input('message');
        $comment->user_id = Auth::id();
        $comment->profile_id = $data->input('profile_id');
        $comment->message_id = $data->input('commentId');
        if ($data->input('commentId')) {
            $comment->message_id = $data->input('commentId');
        }
        $comment->save();

        return redirect()->back();
    }

    public function deleteComment(MessageDeleteRequest $data) {
        $checking = Messages::all()->where('message_id', $data->commentId)->where('message_id', !null);

        if (! $checking->isEmpty()) {
            Messages::first()->where('id', $data->commentId)->update(['user_id' => 0, 'title' => 'Сообщение удалено', 'message' => 'Сообщение удалено']);
        } else {
            Messages::first()->where('id', $data->commentId)->delete();
        }

        return redirect()->back();
    }

    public function allUsers() {
        $profiles = Users::all();

        return view('list')->with('profiles', $profiles);
    }

    public function allComments() {
        $comments = Messages::all()->where('user_id', Auth::id());

        return view('list')->with('comments', $comments->sortByDesc('id'));
    }

    public function comments(Request $request) {
        if ($request->flag) {
            $comments = Messages::all()->where('profile_id', $request->userId)->where('message_id', null)->sortByDesc('id')->skip(5);
            $responces = Messages::all()->where('message_id', !null)->sortByDesc('id');

            return view('includes.message', ['comments' => $comments, 'userId' => $request->userId, 'sessionUserId' => Auth::id(), 'responses' => $responces]);
        }
    }

    public function profileExit() {
        Auth::logout();
        return redirect()->route('form');
    }
}
