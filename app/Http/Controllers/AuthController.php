<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index_login(Request $request){
        return view('admin.login');
    }

    public function post_login(Request $request)
    {


        try {

            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);

            $data['username'] = $request->username;


            $user = User::where('username', $data['username'])->first();
            

            if (Auth::attempt($credentials)) {
                $request->session()->put('user', $user);
                Session::flash('success', 'Login Successfully');
                return  redirect()->intended('/admin/dashboard')->with('message', 'Login Successfully');
            } else {

                Session::flash('error', 'user not found');
                return  redirect()->intended('/admin/login');
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        return redirect('/login');
    }

}
