<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Exceptions\ResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        sleep(1);
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();

                $user = Auth::user();
                return $this->getSuccessResponse(
                    'Login berhasil',
                    [
                        'user' => [
                            'name' => $user->name,
                            'email' => $user->email,
                        ]
                    ],
                    route('admin.dashboard')
                );
            }

            throw new ResponseException(
                'Email atau password salah',
                ResponseException::HTTP_UNAUTHORIZED
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Login Error');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            
            $request->session()->regenerateToken();

            return $this->getSuccessResponse(
                'Logout berhasil',
                null,
                route('admin.dashboard')
            );
        } catch (\Exception $e) {
            return $this->getExceptionResponse($e, 'Logout Error');
        }
    }
}
