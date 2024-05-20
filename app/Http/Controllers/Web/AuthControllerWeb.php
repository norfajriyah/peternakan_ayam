<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Web\UserWeb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthControllerWeb extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ])->validate();

        $user = User::where('email', $data['email']) -> first();
       
        if(Hash::check($data['password'], $user->password)){
            session()->put('user_id', $user->id);
            session()->put('email', $user->email);
            session()->put('name', $user->name);
            session()->put('role', $user->role);
            return redirect('dashboard');
        } else {
            return redirect()->back()->withErrors(['password'=> 'wrong password']);
        }
            
        // if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        //     throw ValidationException::withMessages([
        //         'email' => trans('auth.failed')
        //     ]);
        // }

        // $request->session()->regenerate();

        // return redirect()->route('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profile()
    {
        $user = User::find(session("user_id"));
        return view('profile', ['user'=> $user]);
    }
}
