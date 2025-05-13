<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegister() {
        return view('halaman/registrasi');
    }

    public function processRegister(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        // INSERT VULN (tanpa hashing / sanitasi)
        DB::insert("INSERT INTO users (username, password) VALUES ('$username', '$password')");

        return redirect('/login')->with('success', 'Register success!');
    }

    public function showLogin() {
        return view('halaman/login');
    }

    public function processLogin(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::selectOne("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

        if ($user) {
            Session::put('user', $user->username);
            Session::put('password',$user->password);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Login failed!');
    }

    public function dashboard() {
        $username = Session::get('user');
        $password = Session::get('password');
        return view('halaman/dashboard', compact('username', 'password'));
    }

    public function logout() {
        Session::forget('user');
        return redirect('halaman/login');
    }
}
