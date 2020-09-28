<?php

namespace App\Http\Controllers;


use App\Http\Requests\BooksDeleteRequest;
use App\Models\AccessBooks;
use App\Models\Books;
use App\Http\Requests\BooksCreateRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;

class BooksController extends Controller
{
    public function library() {
        $books = Books::all()->where('profile_id', Auth::id());

        return view('library')->with('books', $books)->with('userId', Auth::id())->with('count', 0);
    }

    public function createBook(BooksCreateRequest $data) {
        $book = new Books;
        $book->title = $data->input('title');
        $book->text = $data->input('text');
        $book->profile_id = $data->input('profile_id');
        $book->save();

        return redirect()->back();
    }

    public function readBook($data) {
        $book = Books::all()->where('id', $data)->first();
        if (!$book) {
            $book = Books::all()->where('token', $data)->first();
            if (!$book) {
                abort(404);
            }
        }

        return view('book')->with('book', $book)->with('edit', false);
    }

    public function editBook($data) {
        $book = Books::all()->where('id', $data)->first();

        return view('book')->with('book', $book)->with('edit', true);
    }

    public function updateBook(Request $data) {
        Books::first()->where('id', $data->bookId)->update(['title' => $data->input('title'), 'text' => $data->input('text')]);
        $book = Books::all()->where('id', $data->bookId)->first();

        return redirect()->route('book', $data->bookId)->with('book', $book)->with('edit', false);
    }

    public function deleteBook(BooksDeleteRequest $data) {
        Books::first()->where('id', $data->bookId)->delete();

        return redirect()->back();
    }

    public function shareBook($data) {
        $token = md5(Str::random(16));
        Books::first()->where('id', $data)->update(['token' => $token]);

        return redirect()->back();
    }

    public function getLibrary(Request $request) {
        if ($request->count % 2 == 0) {
            $books = Books::all()->where('profile_id', Auth::id());

            return view('includes.library')->with('userId', Auth::id())->with('books', $books)->with('mine', true);
        } else {
            $access = AccessBooks::all()->where('user_id', Auth::id());
            $books = \Illuminate\Database\Eloquent\Collection::make();
            foreach ($access as $accessOne) {

                if ($accessOne->book_id != null) {
                    $book = Books::all()->where('id', $accessOne->book_id)->first();
                    $books->put($book->id, $book);
                }
                if ($accessOne->profile_id != null) {
                    $booklibrary = Books::all()->where('profile_id', $accessOne->profile_id);
                    foreach ($booklibrary as $book) {
                        $books->put($book->id, $book);
                    }
                }
            }
            return view('includes.book')->with('userId', Auth::id())->with('books', $books->values())->with('mine', false);
        }
    }

    public function giveAccess($data) {
        $check = AccessBooks::all()->where('user_id', $data)->where('profile_id', Auth::id())->first();
        if (!$check) {
            $access = new AccessBooks;
            $access->profile_id = Auth::id();
            $access->user_id = $data;
            $access->save();
        } else {
            AccessBooks::first()->where('user_id', $data)->where('profile_id', Auth::id())->delete();
        }
        return redirect()->back();
    }
}
