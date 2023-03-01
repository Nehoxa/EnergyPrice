<?php

namespace App\Http\Controllers\Auth;

use RuntimeException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        if ($request->user() === null) {
            throw new RuntimeException('User Must Be Logged In');
        }

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }
}
