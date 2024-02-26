<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()], //'confirmed' ensures password matches 'password_confirmation'
        ]);

        // Encrypt password
        $formFields['password'] = bcrypt($formFields['password']);
        
        // Create user
        $user = User::create($formFields);

        event(new Registered($user));

        // Login
        auth()->login($user);
        
        // return redirect('/')->with('message', 'User created and logged in successfully :)');

        return redirect('/email/verify');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        // Invalidating user session and regenerating the 'csrf' token sent with forms to prevent csrf attacks
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // 'attempt' function used instead of 'login' as attempt returns a boolean value if auth passes or fails, allowing for handling invalid credentials
        if(auth()->attempt($formFields))
        {
            $request->session()->regenerate();  // Regenerating session ID
            return redirect('/')->with('message', 'Logged in');
        }
        
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        
    }
}
