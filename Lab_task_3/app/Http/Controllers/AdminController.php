<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
//use App\Http\Middleware\UserAuthorization;
use App\Http\Middleware\AdminAuthorization;

class AdminController extends Controller
{
    public function AdminLogin()
    {  
        return view('pages.AdminLogin');
    }
    public function loginSubmit(Request $request)
    {
        $admin=Admin::where('username',$request->uname)
                    ->where('password',$request->pass)
                    ->first();
        if($admin)
        {
            $request->session()->put('admin',$admin->username);
            return redirect()->route('userlist');   
            //return "ok"; 
        }  
        return back();
    }
    public function UserList(Request $request)
    {
        $user=User::all();
        return view('pages.UserList')->with('users',$user);
    }
    public function Edit(Request $request)
    {
        $user=User::where('id',$request->userId)->first();
        return view('pages.edit')->with('user',$user);
    }
    public function EditSubmit(Request $request)
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
        $user=User::where('id',$request->userId)->first();
        $user->name=$request->name;
        $user->username=$request->uname;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->age=$request->age;
        $user->save();
        return redirect()->route('userlist');
    }
    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('welcome');
    }
}
