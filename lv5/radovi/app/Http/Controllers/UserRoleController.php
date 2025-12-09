<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,nastavnik,student',
        ]);

        if ($user->id === auth()->id()) {
            return back();
        }

        $user->update([
            'role' => $request->role,
        ]);

        return back();
    }
}
