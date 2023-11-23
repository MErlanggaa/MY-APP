<?php

namespace App\Http\Middleware;

// Your middleware

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekUserLogin
{
    public function handle(Request $request, Closure $next, $rules)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->level == $rules) {
            return $next($request);
        } else {
            return redirect('login')->withErrors([
                'belumLogin' => "Anda Tidak Memiliki Akses",
            ]);
        }
    }
}
