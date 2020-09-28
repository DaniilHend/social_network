<?php

namespace App\Http\Middleware;

use App\Models\AccessBooks;
use App\Models\Books;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $checkToken = Books::all()->where('token', $request->id)->first();
        if ($checkToken) {
            return $next($request);
        } else {
            if (Auth::check()) {
                $book = Books::all()->where('id', $request->id)->first();
                if ($book->profile_id == Auth::id()) {
                    return $next($request);
                } else {
                    $access = AccessBooks::all()->where('user_id', Auth::id())->where('book_id', $request->id)->first();
                    if (!isset($access)) {
                        $access = AccessBooks::all()->where('profile_id', $book->profile_id)->where('user_id', Auth::id())->first();
                        if (!isset($access)) {
                            return redirect()->route('library');
                        } else {
                            return $next($request);
                        }
                    } else {
                        return $next($request);
                    }
                }
            } else {
                return redirect()->route('form');
            }
        }
    }
}
