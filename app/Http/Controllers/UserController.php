<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index_add_user(Request $request)
    {

        return view('admin.user.createUser');
    }
    public function index_view_user(Request $request)
    {
        $user = User::all();
        return view('admin.user.viewUser',['users'=>$user]);
    }

    public function post_add_user(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->username)->first();

            if ($user) {
                Session::flash('error', "username already exist");
                return redirect()->intended('/add-user');
            }
            $password = 
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();
            Session::flash('success',"User Created Successfully!");
            return redirect()->intended('/add-user');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return  redirect()->intended('/add-user');
        }
    }
}
