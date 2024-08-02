<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only(['user_name', 'password']);
        if (Auth::attempt($data)) {
            return auth()->user()->role === 'admin'
                ? Redirect()->route('admin.index')->with('message', 'Đăng nhập thành công')
                : Redirect()->route('/')->with('message', 'Đăng nhập thành công');
        }
        return back()->with('message', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->all();
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('auth.profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $data = $request->except('avatar');
        $newAvatar = $request->hasFile('avatar');
        if ($newAvatar) {
            $data['avatar'] = Storage::put('profile', $request->avatar);
        }
        $user = auth()->user();
        $oldAvatar = $user->avatar;
        $user->update($data);
        if ($newAvatar) {
            if ($oldAvatar && Storage::exists($oldAvatar)) {
                Storage::delete($oldAvatar);
            }
        }
        return back()->with('message', 'Cập nhật profile thành công');
    }

    public function changePassword()
    {
        return view('auth.changePassword');
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|confirmed',
        ]);
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with(['message' => 'Mật khẩu không đúng']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('/')->with('message', 'Đổi mật khẩu thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Đăng xuất thành công');
    }
}
