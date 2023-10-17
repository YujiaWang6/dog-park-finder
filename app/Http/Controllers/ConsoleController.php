<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Park;
use App\Models\Review;
use App\Models\Report;

class ConsoleController extends Controller
{
    public function dashboard()
    {
        $users = User::take(3)->get();
        $parks = Park::take(3)->get();
        $reviews = Review::take(3)->get();
        $reports = Report::take(3)->get();

        return view('console.dashboard',[
            'users'=>$users,
            'parks'=>$parks,
            'reviews'=>$reviews,
            'reports'=>$reports,
        ]);
        
    }

    public function loginForm()
    {
        return view('console.login');
    }

    public function login(Request $request)
    {
        ///ddd($request);
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt($attributes))
        {
            $user = auth()->user();

            $previous = $request->session()->get('url.intended');

            if($previous!==null){
                
                return redirect($previous);
            }else{
                if($user->user_role === 'admin'){
                    return redirect('/console/dashboard');
                }else{
                    return redirect('/');
                }
            }
        }

        return back()
            ->withInput()
            ->withErrors(['email'=> 'Email/password is not correct']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
