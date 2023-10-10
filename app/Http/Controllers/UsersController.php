<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function list()
    {
        return view('users.list', [
            'users' => User::all()
        ]);
    }

    public function deleteConfirm(User $user)
    {
        return view('users.delete',[
            'user'=>$user
        ]);
    }

    public function deleted(User $user)
    {
        if($user->id == auth()->user()->id)
        {
            return redirect('/console/users/list')
                ->with('message', 'Cannot delete your own user account');
        }

        $user->reviews()->delete();

        $user->reports()->delete();

        $user->delete();
        
        return redirect('/console/users/list')
            ->with('message', $user->user_name . ' has beed deleted');
    }

    public function addFrom()
    {
        return view('users.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'user_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'breed' => 'nullable',
            'age' => 'nullable',
            'user_role' => 'nullable',
        ]);

        $user = new User();
        $user->user_name = $attributes['user_name'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->breed = $attributes['breed'];
        $user->age = $attributes['age'];
        if(isset($attributes['user_role'])) 
        {
            $user->user_role = $attributes['user_role'];
        } else {
            $user->user_role = 'user';
        };
        $user->save();

        if(Auth::check() && auth()->user()->user_role==='admin'){
            return redirect('/console/users/list')
            ->with('message', $user->user_name . ' has been created');
        } else{
            Auth::login($user);
            return redirect('/');
        }

    }

    public function editForm(User $user)
    {
        if((auth()->user()->id == $user->id) || auth()->user()->user_role === 'admin')
        {
            return view('users.edit', [
                'user'=>$user
            ]);
        } else{
            return redirect('/');
        }

    }

    public function edit(User $user)
    {
        $attributes = request()->validate([
            'user_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable',
            'breed' => 'nullable',
            'age' => 'nullable',
            'user_role' => 'nullable',
        ]);

        $user->user_name = $attributes['user_name'];
        $user->email = $attributes['email'];
        if($attributes['password']) $user->password = $attributes['password'];

        $user->breed = $attributes['breed'];
        $user->age = $attributes['age'];
        if(isset($attributes['user_role'])) 
        {
            $user->user_role = $attributes['user_role'];
        } else {
            $user->user_role = 'user';
        };
        $user->save();

        if(Auth::check() && auth()->user()->user_role==='admin'){
            return redirect('/console/users/list')
            ->with('message', $user->user_name . ' has been updated');
        } else{
            Auth::login($user);
            return redirect('/console/users/profile/'.$user->id);
        }

    }

    public function profile(User $user)
    {
        return view('users.profile', [
            'user'=>$user,
        ]);
    }
}
