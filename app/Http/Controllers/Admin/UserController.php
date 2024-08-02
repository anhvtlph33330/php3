<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(Request $request, User $user)
    {
        $request->active == 0 ? $active = 1 : $active = 0;
        $user->update(['active' => $active]);
        return back()->with('message', 'Cập nhật thành công');
    }
}
