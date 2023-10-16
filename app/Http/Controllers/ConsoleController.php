<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function dashboard()
    {
        return view('console.dashboard');
        
    }

    public function loginForm()
    {
        return view('console.login');
    }

    public function login(Request $request)
    {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt($attributes))
        {
            $user = auth()->user();

            //$previous = $request->session()->get('url')['intended'];
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
