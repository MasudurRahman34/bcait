<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
<<<<<<< HEAD
        if(auth()->user()->is_admin == 1){
            //return redirect()->route('admin.index');
            return $next($request);
          }
           
        return redirect('/home');
=======
        if(Auth()->user()->is_admin == 1){
            //return response()->json('working', 200);
            //return redirect('/admin');
            //return redirect()->route('admin.index');
            //return true;
           return $next($request);
          }
           
          return redirect('/home');
>>>>>>> 482d78dda703afefd62a4147df5262c197888e53
    }
}
