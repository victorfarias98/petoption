<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function formLogin()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Flasher::addSuccess('Login efetuado com sucesso! Seja bem vindo(a)!');
            return redirect()->route('home');
        }

        return redirect("login");
    }
    public function registrationForm()
    {
        return view('auth.register');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Flasher::addSuccess('Cadastrado com sucesso! Seja bem vindo(a)!');
            return redirect()->route('home');
        }
        Flasher::addError('Erro no seu cadastro, por favor tente novamente');
        return redirect()->route('auth.register');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}