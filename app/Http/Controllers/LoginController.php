<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("home");
        }

        return redirect("login")->withInput()->with('thongBao', 'Tài khoản khoặc mật khẩu không chính xác!');
    }

    public function postRegistration(RegisterRequest $request)
    {
        $data = $request->all();
        $check = $this->create($data);

        return redirect("home")->withSuccess('Great! You have Successfully loggedin');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'sex' => $data['sex'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return Redirect('login');
    }
}
