<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.users', [
            'users' => User::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'role' => $request->role
        ]);

        return back();
    }
}
