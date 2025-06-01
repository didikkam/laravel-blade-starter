<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        try {
            $user = Auth::user();

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'current_password' => 'nullable|required_with:password|current_password',
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            // Update basic info
            $user->name = $validated['name'];
            $user->email = $validated['email'];

            // Update password if provided
            if (isset($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }

            $user->save();

            return $this->getSuccessResponse(
                'Profile updated successfully',
                null,
                route('profile.show'),
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Profile Update Error');
        }
    }
} 