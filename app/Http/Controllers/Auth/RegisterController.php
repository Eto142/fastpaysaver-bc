<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Mail\welcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'address'      => 'required|string|max:500',
            'phone'        => 'required|string|max:30',
            'country'      => 'required|string|max:100',
            'account_type' => 'required|string',
            'currency'     => 'required|string|max:10',
            'account_pin'  => 'required|digits:4',
            'password'     => 'required|string|confirmed|min:6',
        ]);

        $accountNumber = mt_rand(1000000000, 9999999999);

        $user = User::create([
            'first_name'   => $request->name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'address'      => $request->address,
            'phone_number' => $request->phone,
            'country'      => $request->country,
            'account_type' => $request->account_type,
            'currency'     => $request->currency,
            'account_pin'  => $request->account_pin,
            'a_number'     => $accountNumber,
            'password'     => Hash::make($request->password),
        ]);

        // Generate and save verification token
        $validToken = mt_rand(1234, 9999);
        $user->token = $validToken;
        $user->save();

        Mail::to($user->email)->send(new VerificationEmail($validToken));

        return redirect()->route('verify', $user->id);
    }
}
