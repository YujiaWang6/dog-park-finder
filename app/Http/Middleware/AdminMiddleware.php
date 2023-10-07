<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::check())
        {
            
            if(Auth::user()->user_role == 'admin')
            {
                
                return $next($request);
            }else{
                return redirect('/')->with('message', 'Access Denied as you are not Admin');
            }
        }else{
            return redirect('/console/login')->with('message', 'Login to access the website');
        }

        return $next($request);
        /*public function handle(Request $request, Closure $next)
        {
            // Check if the middleware is being executed
            dd('AdminMiddleware is running');

            if (Auth::check()) {
                // Check if the user is authenticated
                dd('User is authenticated');

                if (Auth::user()->user_role === 'admin') {
                    // Check if the user has the 'admin' role
                    dd('User has admin role');
                    return $next($request);
                } else {
                    // Check if the user does not have the 'admin' role
                    dd('User does not have admin role');
                    return redirect('/')->with('message', 'Access Denied as you are not Admin');
                }
            } else {
                // Check if there is no authenticated user
                dd('User is not authenticated');
                return redirect('/')->with('message', 'Login to access the website');
            }
        }*/

       
    
    }
}