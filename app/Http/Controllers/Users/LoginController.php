<?php

namespace App\Http\Controllers\Users;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Kiểm tra quyền của người dùng
            $user = Auth::user();
            if ($user->quyen == 0) {
                return redirect()->intended('/');
            } elseif ($user->quyen == 1) {
                return redirect()->intended('/admin');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
