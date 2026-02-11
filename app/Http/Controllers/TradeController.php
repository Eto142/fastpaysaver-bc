<?php

namespace App\Http\Controllers;
use App\Models\Trade;
use App\Models\Transaction;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Card;
use App\Models\Credit;
use App\Models\Debit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TradeController extends Controller
{
  public function store(Request $request)
{
    $request->validate([
        'asset_symbol' => 'required|string',
        'asset_name' => 'required|string',
        'type' => 'required|in:buy,sell',
        'order_type' => 'required|in:market,limit,stop',
        'amount_usd' => 'required|numeric|min:0',
        'quantity' => 'required|numeric|min:0',
        'limit_price' => 'nullable|numeric|min:0',
    ]);

    $user = Auth::user();

    // Balance calculation
    $credit_transfers = Transaction::where('user_id', $user->id)->where('transaction_status', '1')->where('transaction_type', 'Credit')->sum('transaction_amount');
    $debit_transfers = Transaction::where('user_id', $user->id)->where('transaction_status', '1')->where('transaction_type', 'Debit')->sum('transaction_amount');
    $user_deposits = Deposit::where('user_id', $user->id)->where('status', '1')->sum('amount');
    $user_loans = Loan::where('user_id', $user->id)->where('status', '1')->sum('amount');
    $user_card = Card::where('user_id', $user->id)->sum('amount');
    $user_credit = Credit::where('user_id', $user->id)->where('status', '1')->sum('amount');
    $user_debit = Debit::where('user_id', $user->id)->where('status', '1')->sum('amount');

    $balance = $user_deposits + $credit_transfers + $user_loans - $debit_transfers - $user_card;

    if ($request->type === 'buy' && $request->amount_usd > $balance) {
        return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');

    $ref = rand(10000000, 99999999);
    $transactionId = "TR" . $ref;

    // Save the trade
    $trade = Trade::create([
        'user_id' => $user->id,
        'transaction_id' => $transactionId,
        'asset_symbol' => $request->asset_symbol,
        'asset_name' => $request->asset_name,
        'type' => $request->type,
        'order_type' => $request->order_type,
        'amount_usd' => $request->amount_usd,
        'quantity' => $request->quantity,
        'limit_price' => $request->limit_price,
    ]);

    // Record the transaction
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $transactionId;
    $transaction->transaction_ref = $transactionId;
    $transaction->transaction_amount = $request->amount_usd;
    $transaction->credit = $request->type === 'sell' ? $request->amount_usd : 0;
    $transaction->debit = $request->type === 'buy' ? $request->amount_usd : 0;
    $transaction->transaction_type = $request->type === 'buy' ? 'Debit' : 'Credit';
    $transaction->transaction = 'Trade';
    $transaction->email = $user->email;
    $transaction->transaction_description = ucfirst($request->type) . " " . $request->quantity . " of " . $request->asset_symbol;
    $transaction->transaction_status = 1;
    $transaction->save();

     return back()->with('success', ' Trade successfully placed!');
}
}

    public function history()
    {
        return response()->json(Trade::latest()->get());
    }
}
