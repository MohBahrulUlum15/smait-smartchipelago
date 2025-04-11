<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('backend.auth.reset-password', [
            'title' => 'Reset Password',
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // check if the email exists in the database
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with(
                'error',
                'Email tidak ditemukan!'
            );
        }

        // save the new password
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        // dd($request->all());

        // Logic to reset the password goes here

        return redirect()->route('login')->with('success', 'Password berhasil diubah.');
    }
}
