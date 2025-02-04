<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function showLoginForm()
    {
        $user = User::get();
        return view('login', compact('user'));
    }

    public function simpan_user(Request $request){
        $validator = $request->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|string|min:6|confirmed',
        ]);

        $data = [
            'name' => $request->first_name ." ". $request->last_name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ];

        User::create($data);

        return redirect()->back()->with('success','Registrasi SUkses');
    }

    public function login_action(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=> 'required'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password' => $request->password])){
            $user=Auth::user();
            $request->session()->put('user', $user);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors('password','Email atau Password Salah');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
 