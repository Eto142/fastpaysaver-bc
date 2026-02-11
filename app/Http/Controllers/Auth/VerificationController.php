<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Mail\welcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /**
     * Show the email verification form.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('auth.verify', [
            'email' => $user->email,
            'hash'  => $user->password,
            'id'    => $user->id,
        ]);
    }

    /**
     * Verify the email token.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'digit' => 'required',
        ]);

        $user = User::where('token', $request->input('digit'))->first();

        if (!$user) {
            return back()->with('error', 'Incorrect Activation Code!');
        }

        $user->is_activated = 1;
        $user->token = null;
        $user->save();

        $data = [
            'name'     => $user->first_name . ' ' . $user->last_name,
            'a_number' => $user->a_number,
            'email'    => $user->email,
            'password' => '*********',
        ];

        Mail::to($user->email)->send(new welcomeEmail($data));

        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('status', 'Your account has been verified successfully.');
    }

    /**
     * Resend the verification code.
     */
    public function resend($id)
    {
        $user = User::findOrFail($id);

        $validToken = mt_rand(1234, 9999);
        $user->token = $validToken;
        $user->save();

        Mail::to($user->email)->send(new VerificationEmail($validToken));

        return redirect()->route('verify', $user->id)
            ->with('message', 'Verification code has been resent to your email.');
    }
}
