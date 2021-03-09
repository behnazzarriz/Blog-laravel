<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class  Admin
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

        if(Auth::check()){
            $user=Auth::user();
            if($user->isAdmin()){
                return $next($request);
            }
            else
            {
                return redirect('/');
            }
        }
        else{
            return redirect('login');
        }

    }
}
