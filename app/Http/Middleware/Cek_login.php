<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @param $roles
     * @return Response
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        // jika belum lgoin akan di arahkan ke halaman login
        if (!Auth::check()) {
            return redirect('login');
        }

        //menyimpan data user
        $user = Auth::user();

        //jika user sesuai dengan level akan melanjutkan Request
        if ($user->level_id == $roles) {
            return $next($request);
        }

        //jika tidak sesuai akan me-return demgan 'maaf anda tidak memiliki akses'.
        return redirect('login')->with('error', 'Maaf anda tidak memiliki akses');
    }
}