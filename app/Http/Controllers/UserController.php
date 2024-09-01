<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registrationView(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('register.registerForm');
    }

    public function userRegister(Request $request)
    {
        $validatedRequest = $request->validate([
            'first_name' => ['required', 'string', 'max:10'],
            'last_name' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:50'],
            'password' => ['required', 'string', 'max:10'],
        ]);

        if ($validatedRequest) {
            $user = new User();
            $user->first_name = $validatedRequest['first_name'];
            $user->last_name = $validatedRequest['last_name'];
            $user->email = $validatedRequest['email'];
            $user->password = $validatedRequest['password'];
            $user->save();

            session()->flash('success', 'User registration completed!');

            return redirect()->route('register-view');
        }


    }
}
