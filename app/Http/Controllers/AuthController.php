<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // Show login form
    public function login(Request $request)
    {
        $email = $request->cookie('email');
        $password = $request->cookie('password');
        return view('auth.login', [
            'email' => $email
        ]);
    }

    // Handle login authentication
    public function authenticate(Request $request): \Illuminate\Http\RedirectResponse
    {
        Cookie::queue(Cookie::forget('email'));
        Cookie::queue(Cookie::forget('password'));
        Cookie::queue(Cookie::forget('remember_me'));

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ($request->has('remember_me')) {
            $minutes = 60 * 24 * 7;
            Cookie::queue('email', $request->email, $minutes);
            Cookie::queue('password', $request->password, $minutes);
            Cookie::queue('remember_me', $request->remember_me, $minutes);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('errorMessage', 'Login failed. Please try again.');
    }

    // Show register form
    public function register()
    {
        return view('auth.register');
    }

    // Handle user registration
    public function store(Request $request)
    {
        //        dd($request->input());
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $validatedData['role_id'] = 2;
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::query()->create($validatedData);

        return redirect('/login')->with('successMessage', 'Register successful! Please log in.');
    }

    public function storeAjax(Request $req): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($req->all(), [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        if ($validator->fails()) {
            return response()->json([
               'status' => 400,
               'message' => $validator->messages(),
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => "Register Successfully"
        ]);
    }

    // Handle user session logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Handle user change name
    public function changeProfile()
    {
        return view('auth.profile');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->name = $request['name'];
        $user->save();
        return back()->with('successMessage', 'Name changed successfully');
    }

    // Handle user change password
    public function changePassword()
    {
        return view('auth.password');
    }

    // Change password for Auth User
    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return back()->with('errorMessage', 'Your current password does not match');
        }
        if (strcmp($request->get('old_password'), $request->get('new_password')) === 0) {
            return back()->with('errorMessage', 'Your current password cannot be same with the new password');
        }
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed'
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return back()->with('successMessage', 'Password changed successfully');
    }
}
