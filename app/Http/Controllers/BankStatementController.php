<?php

namespace App\Http\Controllers;

use App\Mail\BankStatementMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class BankStatementController extends Controller
{
    public function sendBankStatement(Request $request)
    {
        $user = auth()->user();
        $transactions = $request->get('transactions');

        // Send email with PDF
        Mail::to($user->email)->send(new BankStatementMail($transactions, $user));

        return response()->json(['message' => 'Bank Statement sent successfully to your email.']);
    }
}
