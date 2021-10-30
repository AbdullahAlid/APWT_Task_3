<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Middleware\UserAuthorization;

class UserController extends Controller
{
    public $vid = 0;
    public function login()
    {
        return view('pages.login');
    }
    public function loginSubmit(Request $request)
    {
        $user=User::where('username',$request->uname)
                    ->where('password',$request->pass)
                    ->first();
        if($user)
        {
            $request->session()->put('user',$user->name);
            $request->session()->put('id',$user->id);
            return redirect()->route('dashboard');
            
        }  
        return back();
    }
    public function registration()
    {
        return view('pages.registration');
    }
    public function registrationSubmit(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:4',
            'uname'=>'required',
            'password'=>'required',
            'email'=>'required',
            'dob'=>'required',
            'age'=>'required',

        ],[
            'name.required'=>'Enter your name',
            'uname.required'=>'Enter your username',
            'password.required'=>'Enter your password'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->username=$request->uname;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->age=$request->age;
        $user->save();
        return "User Added Successfully";
    }
    public function dashboard(Request $request)
    {
        $user=User::where('id',$request->session()->get('id'))->first();
        return view('pages.dashboard')->with('user',$user);
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
