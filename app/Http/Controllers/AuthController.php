<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class AuthController extends Controller {
    public function login(Request $request) {
        $creds = $request->only('login', 'password');

        if (auth()->attempt($creds)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Вы успешно авторизовались');
        }
        return redirect('/login')->with('error', 'Некорректные данные для входа');
    }

    public function register(StoreUserRequest $request) {
        $validated = $request->validated();

        $user = new User();
        $user->login = $validated['login'];
        $user->password = password_hash($validated['password'], PASSWORD_DEFAULT);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->save();

        return redirect('/login')->with('success', 'Вы успешно зарегистрировались, теперь войдите в аккаунт');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Вы вышли из аккаунта');
    }
}
