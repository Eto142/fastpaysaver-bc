<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Log;
use PDF;
use App\Models\Nft;
use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Mail\nftEmail;
use App\Models\Credit;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Mail\approveTransactionEmail;
use App\Mail\bankStatementEmail;
use App\Models\Transfer;
use App\Mail\nftUserEmail;
use App\Mail\SendTokenEmail;
use App\Models\Trade;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    /**
     * Calculate the user's current balance.
     */
    protected function getUserBalance($userId)
    {
        $creditTransfers = Transaction::where('user_id', $userId)
            ->where('transaction_status', '1')
            ->where('transaction_type', 'Credit')
            ->sum('transaction_amount');

        $debitTransfers = Transaction::where('user_id', $userId)
            ->where('transaction_status', '1')
            ->where('transaction_type', 'Debit')
            ->sum('transaction_amount');

        $deposits = Deposit::where('user_id', $userId)->where('status', '1')->sum('amount');
        $loans    = Loan::where('user_id', $userId)->where('status', '1')->sum('amount');
        $cards    = Card::where('user_id', $userId)->sum('amount');
        $credits  = Credit::where('user_id', $userId)->where('status', '1')->sum('amount');
        $debits   = Debit::where('user_id', $userId)->where('status', '1')->sum('amount');

        return $deposits + $creditTransfers + $loans - $debits - $debitTransfers - $cards;
    }

    /**
     * Show the user dashboard home page.
     */
    public function home()
    {
        $user = Auth::user();

        // Check if account is activated
        if (!$user->is_activated) {
            return redirect()->route('verify', $user->id);
        }

        $data['transaction'] = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $data['trades'] = Trade::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $data['credit_transfers'] = Transaction::where('user_id', $user->id)
            ->where('transaction_status', '1')
            ->where('transaction_type', 'Credit')
            ->sum('transaction_amount');

        $data['debit_transfers'] = Transaction::where('user_id', $user->id)
            ->where('transaction_status', '1')
            ->where('transaction_type', 'Debit')
            ->sum('transaction_amount');

        $data['user_deposits'] = Deposit::where('user_id', $user->id)->where('status', '1')->sum('amount');
        $data['user_loans']    = Loan::where('user_id', $user->id)->where('status', '1')->sum('amount');
        $data['user_card']     = Card::where('user_id', $user->id)->sum('amount');
        $data['user_credit']   = Credit::where('user_id', $user->id)->where('status', '1')->sum('amount');
        $data['user_debit']    = Debit::where('user_id', $user->id)->where('status', '1')->sum('amount');
        $data['balance']       = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
                               - $data['user_debit'] - $data['debit_transfers'] - $data['user_card'];

        // Stats for dashboard cards
        $data['totalDeposit'] = $data['user_deposits'] + $data['credit_transfers'];
        $data['totalSpent']   = $data['user_debit'] + $data['debit_transfers'] + $data['user_card'];
        $data['activeCards']  = Card::where('user_id', $user->id)->where('status', '1')->count();

        // Card details for card widget
        $data['cards'] = Card::where('user_id', $user->id)->get();

        return view('dashboard.home', $data);
    }

    public function transferPage()
    {
        return view('dashboard.transfer');
    }
    
      public function userProfile()
    {

        return view('dashboard.profile');
 
    }

    public function skrill()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        // $data['debit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_type','Debit')->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['debit_transfers']- $data['user_card'];
        
        return view('dashboard.skrill',$data);
 
    }


      public function cfx()
    {
        // $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        // $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        // $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        // $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
             $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['user_debit'] - $data['debit_transfers']- $data['user_card'];
        
        
        
        return view('dashboard.fx',$data);
 
    }

    public function crypto()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.crypto',$data);
 
    }


    public function cryptopage()
    {
        // $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        // $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        // $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        // $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        // $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
             $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['user_debit'] - $data['debit_transfers']- $data['user_card'];
        
        
        
        return view('dashboard.cryptopage',$data);
 
    }



    public function cryptoDeposit()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.crypto_d',$data);
 
    }

    public function bank()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.bank',$data);
 
    }

    public function paypal()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.paypal', $data);
 
    }

    public function card()
    {
         
        $data['details'] = Card::where('user_id',Auth::user()->id)->get();
        $data['detail'] = Card::where('user_id', Auth::user()->id)->first();

        
        return view('dashboard.card',$data);
 
    }

    public function token()
    {
         
        return view('dashboard.token');
 
    }
    
    
    
       public function Usertoken()
    {
         
        return view('dashboard.token');
 
    }
    


public function UserOtp(Request $request)
{
    // Validate and sanitize input
    $request->validate([
        'otp' => 'required|numeric', // Adjust validation rules as needed
    ]);

    $otp = $request->input('otp');

    // Check if OTP matches
    if ($otp != Auth::user()->otp) {
        return back()->with('error', 'Incorrect TAC Code!');
    }

    // Clear the OTP from the user's record as it's used
    Auth::user()->otp = null;
    Auth::user()->save();

    // Redirect to the withdrawal_completed page
    return redirect()->route('withdrawal_completed');
}

    
    
    
    public function Completed()
{
    return view('dashboard.withdrawal_completed');
}

    
    public function requestCard($user_id)
    {
        // $userData = User::where('id',$user_id)->first();
        // $user_id = $userData->id;

        $existingCard = Card::where('user_id', $user_id)->first();

        // Check if the user already has a card
        if ($existingCard) {
            return back()->with('error', 'You already have a card. You cannot request another one.');
        }


        $amount = 0;

        

   $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }
               
        // $card_number = rand(7650399737987384, 1234498894128763);  
                $card_number = '';
for ($i = 0; $i < 16; $i++) {
    $card_number .= rand(0, 9);
}    
        
        $cvc = rand(765, 123);        
        $ref = rand(76503737, 12344994);
        $startDate = date('Y-m-d');
        $expiryDate = date('Y-m-d', strtotime( $startDate.'+ 24 months'));

        $ref = rand(76503737, 12344994);   
       $card = new Card;
       $card->transaction_id = $ref;
       $card->user_id = Auth::user()->id;
        $card->card_number = $card_number;
        $card->card_cvc = $cvc;
        $card->card_expiry = $expiryDate;
        $card->email = Auth::user()->email;
        $card->status = 1;
        $card->save();

        // $transaction = new Transaction;
        // $transaction->user_id = Auth::user()->id;
        // $transaction->transaction_id = $ref;
        // $transaction->transaction_ref = "CD".$ref;
        // $transaction->transaction_type = "Debit";
        // $transaction->transaction = "Card";
        // // $transaction->transaction_amount = "10";
        // $transaction->email = Auth::user()->email;
        // $transaction->credit =  "0";
        // $transaction->debit = "0";
        // $transaction->transaction_description = "ATM Card";
        // $transaction->transaction_status = 1;
        // $transaction->save();


        return view('dashboard.getting_card');
    }
    
                 
   
    

    
  

    public function notification()
    {
        return view('dashboard.notification');
    } 
    
    
    
    
    
    
    
  public function sendBankStatement(Request $request)
    {
        try {
            // Mock email content and transactions
            $transactions = $request->input('transactions'); // Transactions sent from the frontend
            $user = auth()->user();

            // Send the email
            Mail::send('emails.bank-statement', ['transactions' => $transactions, 'user' => $user], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Your Bank Statement');
            });

            // Return a success response
            return response()->json(['message' => 'Bank statement emailed successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email: ' . $e->getMessage()], 500);
        }
    }
    
        public function bankstatement()
    {
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        return view('dashboard.bankstatement',$data);
    }
    
    public function transactions()
    {
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        return view('dashboard.transactions',$data);
    } 

    public function viewInvoice(Request $request, $tid)
    {
        
            $data['invoice'] = DB::table('cards')
            ->join('transactions', 'cards.id', '=', 'transactions.transaction_id')
            ->select('cards.*', 'transactions.*')
            ->where('transaction_id',$tid)
            ->get();
    
            return view('dashboard.view_invoice',$data);
        
        if($request['type']=='Transfer')
        {
            $data['invoice'] = DB::table('transfers')
            ->join('transactions', 'transfers.id', '=', 'transactions.transaction_id')
            ->select('transfers.*', 'transactions.*')
            ->where('id',$tid)
            ->get();
            return view('dashboard.transfer_invoice',$data);
        }

    }
    
    public function pendingTransfer()
    {
        return view('dashboard.pending_transfer');
    }  
    public function settings()
    {
        return view('dashboard.settings');
    } 
    
    public function updateTransactionPin(Request $request)
    {
        $request->validate([
            'current_pin' => 'required|digits:4',
            'new_pin' => 'required|digits:4|confirmed',
        ]);

        // Check current PIN
        if ($request->current_pin != Auth::user()->account_pin) {
            return back()->with('error', 'Current PIN is incorrect.');
        }

        // Update the PIN
        User::whereId(Auth::user()->id)->update([
            'account_pin' => $request->new_pin
        ]);

        return back()->with('success', 'Transaction PIN updated successfully.');
    }

    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
             $data['message'] = 'old password not correct';
            return back()->with("error", "Old Password Doesn't match! Please input your correct old password");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    Session::flush();
    Auth::guard('web')->logout();
    return redirect('login')->with('status', 'Password Updated Successfully, Please login with your new password');

}
    public function profile()
    {
        return view('dashboard.profile');
    } 
    
     public function CardWithdrawal(){
         
          $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
          $data['details'] = Card::where('user_id',Auth::user()->id)->get();
        return view('dashboard.card_withdrawal', $data);
    } 

    public function userChangePassword()
    {
        return view('dashboard.change_password');
    } 

    public function deposit()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->sum('transaction_amount');
        $data['debit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.deposit',$data);
    }


     public function paybills()
    { 
       $data['outstanding_loan']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
       $data['pending_loan']= Loan::where('user_id', Auth::user()->id)->where('status','0')->sum('amount');
       $data['transaction']= Transaction::where('user_id', Auth::user()->id)->where('transaction','Loan')->get();
        return view('dashboard.paybills',$data);
    } 






    public function loan()
    { 
       $data['outstanding_loan']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
       $data['pending_loan']= Loan::where('user_id', Auth::user()->id)->where('status','0')->sum('amount');
       $data['transaction']= Transaction::where('user_id', Auth::user()->id)->where('transaction','Loan')->get();
        return view('dashboard.loan',$data);
    } 


  public function LoanUser()
    { 
    //    $data['outstanding_loan']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    //    $data['pending_loan']= Loan::where('user_id', Auth::user()->id)->where('status','0')->sum('amount');
    //    $data['transaction']= Transaction::where('user_id', Auth::user()->id)->where('transaction','Loan')->get();
       $data['data'] = $request->session()->get('data');
        return view('dashboard.loanuser',$data);
    } 

    // public function thecard()
    // { 
    //    $data['outstanding_loan']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    //    $data['pending_loan']= Loan::where('user_id', Auth::user()->id)->where('status','0')->sum('amount');
    //    $data['transaction']= Transaction::where('user_id', Auth::user()->id)->where('transaction','Loan')->get();
    //     return view('dashboard.card',$data);
    // } 
    

   
  






    
//     public function uploadKyc(Request $request){
        
// $kyc = Auth::user();
// $kyc->kyc_status = 0;

// $file_id_card = $request->file('card');
// $file_passport = $request->file('pass');
// $file_driver_license = $request->file('driver_license');

// $ext_id_card = $file_id_card->getClientOriginalExtension();
// $ext_passport = $file_passport->getClientOriginalExtension();
// $ext_driver_license = $file_driver_license->getClientOriginalExtension();

// $filename_id_card = time() . '_' . uniqid() . '.' . $ext_id_card;
// $filename_passport = time() . '_' . uniqid() . '.' . $ext_passport;
// $filename_driver_license = time() . '_' . uniqid() . '.' . $ext_driver_license;

// $file_id_card->move('uploads/kyc/', $filename_id_card);
// $file_passport->move('uploads/kyc/', $filename_passport);
// $file_driver_license->move('uploads/kyc/', $filename_driver_license);

// $kyc->id_card = $filename_id_card;
// $kyc->passport = $filename_passport;
// $kyc->driver_license = $filename_driver_license;

// $kyc->save();

//         return redirect('profile')->with('status', 'Document updated successfully, please wait for approval');
//     }




// public function uploadKyc(Request $request) {
//     // Retrieve the authenticated user
//     $kyc = Auth::user();
//     // Set KYC status to 0 (assuming 0 means pending approval)
//     $kyc->kyc_status = 0;

//     // Check and handle each file upload if it exists in the request
//     if ($request->hasFile('card')) {
//         $file_id_card = $request->file('card');
//         $ext_id_card = $file_id_card->getClientOriginalExtension();
//         $filename_id_card = time() . '_' . uniqid() . '.' . $ext_id_card;
//         $file_id_card->move('uploads/kyc/', $filename_id_card);
//         $kyc->id_card = $filename_id_card;
//     }

//     if ($request->hasFile('pass')) {
//         $file_passport = $request->file('pass');
//         $ext_passport = $file_passport->getClientOriginalExtension();
//         $filename_passport = time() . '_' . uniqid() . '.' . $ext_passport;
//         $file_passport->move('uploads/kyc/', $filename_passport);
//         $kyc->passport = $filename_passport;
//     }

//     if ($request->hasFile('driver_license')) {
//         $file_driver_license = $request->file('driver_license');
//         $ext_driver_license = $file_driver_license->getClientOriginalExtension();
//         $filename_driver_license = time() . '_' . uniqid() . '.' . $ext_driver_license;
//         $file_driver_license->move('uploads/kyc/', $filename_driver_license);
//         $kyc->driver_license = $filename_driver_license;
//     }

//     // Save the updated KYC status and documents to the database
//     $kyc->save();

//     // Redirect to the user's profile page with a success message
//     return redirect('profile')->with('status', 'Documents updated successfully. Please wait for approval.');
// }




public function uploadKyc(Request $request)
{
    // Validate uploaded files
    $request->validate([
        'card' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'pass' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'driver_license' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    $kyc = Auth::user();
    $kyc->kyc_status = 0; // Pending approval

    // Handle ID Card upload
    if ($request->hasFile('card')) {
        $file = $request->file('card');
        $filename = 'card_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('private/kyc', $filename);
        $kyc->id_card = $filename;
    }

    // Handle Passport upload
    if ($request->hasFile('pass')) {
        $file = $request->file('pass');
        $filename = 'passport_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('private/kyc', $filename);
        $kyc->passport = $filename;
    }

    // Handle Driver License upload
    if ($request->hasFile('driver_license')) {
        $file = $request->file('driver_license');
        $filename = 'driver_license_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('private/kyc', $filename);
        $kyc->driver_license = $filename;
    }

    $kyc->save();

    return redirect('profile')->with('status', 'Documents uploaded successfully. Awaiting verification.');
}






// BankController.php
// public function showStep1()
// {
//     return view('bank.transfer-step1');
// }
public function showStep2(Request $request)
{
    $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Credit')
        ->sum('transaction_amount');

    $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Debit')
        ->sum('transaction_amount');

    $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');

    $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');

    $data['user_card'] = Card::where('user_id', Auth::user()->id)
        ->sum('amount');

    $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');

    $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');

    $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans']
        - $data['debit_transfers'] - $data['user_card'];

    // Pass page 1 data to page 2
    $details = $request->only([
        'account_name',
        'account_number',
        'bank_name',
        'routing_number',
        'account_type'
    ]);

    $balance = $data['balance'];

    return view('dashboard.transfer-step2', compact('details', 'data', 'balance'));
}







    public function bankTransfer(Request $request)
    {
        
                
        $otp = $request->input('otp');
        $amount = $request->input('amount');
        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }

        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }
    

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }

        
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }


        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }
        


        $ref = rand(76503737, 12344994);
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "TR".$ref;
        $transaction->transaction_ref = "TR".$ref;

        $transaction->transaction_amount =  $request['amount'];
        $transaction->credit =  "0";
        $transaction->debit =  $request['amount'];;

        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Bank Transfer";
        $transaction->transaction_amount = $request['amount'];
        $transaction->credit =  "0";
        $transaction->debit = $request['amount'];
        $transaction->email = Auth::user()->email;
        $transaction->transaction_description = "Transfer to ".$request['account_name'];
        $transaction->account_name = $request['account_name'];
        $transaction->account_number = $request['account_number'];
        $transaction->account_type = $request['account_type'];
        $transaction->bank_name = $request['bank_name'];
         $transaction->routing_number = $request['routing_number'];
        $transaction->transaction_status = 1;
        
        
        $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
         $currency = Auth::user()->currency;
        // $token = rand(7650, 1234);
        //  $user = Auth::user();
        // $user->otp = $token;
        // $user->save();

    //     $data = [
    //     'first_name' => Auth::user()->first_name,
    //   'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));
        $transaction->save();

    
    // return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
    
     $email = $transaction->email; // Assuming there's a user relationship in the transactions table
    $amount = $transaction->transaction_amount;
    $transactionType = $transaction->transaction; // Assuming this is the correct property name
    $transactionId = $transaction->transaction_id;
        // Compose the email message
    $data = "Your " . $currency . " " . $amount . " for " . $transactionType . " with the transaction ID " . $transactionId . " has been transfered successfully!";

    // Send the email notification
    Mail::to($email)->send(new approveTransactionEmail($data));
       return redirect()->route('withdrawal_completed');
    }

    public function paypalTransfer(Request $request)
    {
                

        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }
    
        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }


        
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }

   $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }


        $ref = rand(76503737, 12344994);


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "PAY".$ref;
        $transaction->transaction_ref = "PAY".$ref;
        $transaction->transaction_type = "Debit";
        $transaction->email = Auth::user()->email;
        $transaction->transaction = "Paypal Withdrawal";
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "Paypal transaction";
        $transaction->transaction_status = 1;
        
        
        
         $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        // $token = rand(7650, 1234);
        //  $user = Auth::user();
        // $user->otp = $token;
        // $user->save();

    //     $data = [
    //     'first_name' => Auth::user()->first_name,
    //   'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));
        $transaction->save();

        
    //     $email = Auth::user()->email;
    //     $first_name = Auth::user()->first_name;
    //     $token = rand(7650, 1234);

    //     $data = [
    //   'first_name' => Auth::user()->first_name,
    //   'token' =>  $token,
    //    ];
    // Mail::to($email)->send(new SendTokenEmail($token, $first_name));

    // return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
    
     $email = $transaction->email; // Assuming there's a user relationship in the transactions table
    $amount = $transaction->transaction_amount;
    $transactionType = $transaction->transaction; // Assuming this is the correct property name
    $transactionId = $transaction->transaction_id;
        // Compose the email message
    $data = "Your $" . $amount . " for " . $transactionType . " with the transaction ID " . $transactionId . " has been transfered successfully!";

    // Send the email notification
    Mail::to($email)->send(new approveTransactionEmail($data));
       return redirect()->route('withdrawal_completed');
    }


    public function skrillTransfer(Request $request)
    {
                
        $otp = $request->input('otp');
        $amount = $request->input('amount');
        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }
        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }


         
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }
         $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }


        $ref = rand(76503737, 12344994);


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "SKR".$ref;
        $transaction->transaction_ref = "SKR".$ref;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Skrill Withdrawal";
        $transaction->email = Auth::user()->email;
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "Skrill Withdrawal transaction";
        $transaction->transaction_status = 1;
        
         $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        // $token = rand(7650, 1234);
        //  $user = Auth::user();
        // $user->otp = $token;
        // $user->save();

    //     $data = [
    //     'first_name' => Auth::user()->first_name,
    //   'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));
        $transaction->save();

        
       
       

    // return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
    
     $email = $transaction->email; // Assuming there's a user relationship in the transactions table
    $amount = $transaction->transaction_amount;
    $transactionType = $transaction->transaction; // Assuming this is the correct property name
    $transactionId = $transaction->transaction_id;
        // Compose the email message
    $data = "Your $" . $amount . " for " . $transactionType . " with the transaction ID " . $transactionId . " has been transfered successfully!";

    // Send the email notification
    Mail::to($email)->send(new approveTransactionEmail($data));
       return redirect()->route('withdrawal_completed');
    }








    
    public function cryptoTransfer(Request $request)
    {
                
        $otp = $request->input('otp');
        $amount = $request->input('amount');
        
        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }
    
        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }




        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }



        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
         if($amount > $data['balance'])
         {
             return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
     }


        $ref = rand(76503737, 12344994);


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "CRP".$ref;
        $transaction->transaction_ref = "CRP".$ref;


        $transaction->transaction_type = "Debit";
        $transaction->credit = "0";
        $transaction->transaction_amount = $request['amount'];
        $transaction->debit = $request['amount'];
        $transaction->transaction = "Crypto Withdrawal";
        $transaction->email = Auth::user()->email;
        $transaction->wallet_type = $request['wallet_type'];
        $transaction->wallet_address = $request['wallet_address'];
        $transaction->transaction_description = "Crypto Withdrawal transaction";
        $transaction->transaction_status = 1;


    
        
        $email = Auth::user()->email;
        $currency = Auth::user()->currency;
        $first_name = Auth::user()->first_name;
        // $token = rand(7650, 1234);
        //  $user = Auth::user();
        // $user->otp = $token;
    //     $user->save();

    //     $data = [
    //     'first_name' => Auth::user()->first_name,
    //   'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));

        $transaction->save();

        // return view('dashboard.token');
        // return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
        
         $email = $transaction->email; // Assuming there's a user relationship in the transactions table
    $amount = $transaction->transaction_amount;
    $transactionType = $transaction->transaction; // Assuming this is the correct property name
    $transactionId = $transaction->transaction_id;
        // Compose the email message
    $data = "Your " . $currency . " " . $amount . " for " . $transactionType . " with the transaction ID " . $transactionId . " has been transfered successfully!";

    // Send the email notification
    Mail::to($email)->send(new approveTransactionEmail($data));
       return redirect()->route('withdrawal_completed');
    }















public function cardTransfer(Request $request)
{
    $otp = $request->input('otp');
    $amount = $request->input('amount');
    $user = Auth::user();

    if ($user->user_status == 1) {
        return view('dashboard.frozen'); // Return a view indicating the account is frozen
    }

    if ($user->user_activity == 1) {
        return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
    }

    $otp = $request->input('otp');
    $amount = $request->input('amount');

//      if($otp!=Auth::user()->otp)
//      {
//          return back()->with('error', ' incorrect Transfer Authorization Code!');
//  }


    $transaction_pin = $request->input('transaction_pin');
    if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', 'Incorrect Transaction Pin number!');
    }

    $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Credit')
        ->sum('transaction_amount');
    $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Debit')
        ->sum('transaction_amount');
    $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
    $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

    if ($amount > $data['balance']) {
        return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!!');
    }
    
    
    
     // Verify if user has a card associated with their account
    $userCard = Card::where('user_id', Auth::user()->id)->first();

    if (!$userCard) {
        return back()->with('error', 'Card not purchased yet. Please purchase a card first.');
    }
    
    

    // Verify if card details (number, CVV, expiry date) match
    $card = Card::where('user_id', Auth::user()->id)
        ->where('card_number', $request['card_number'])
        ->where('card_cvc', $request['cvv'])
        ->first();

    if (!$card) {
        return back()->with('error', 'Card details do not match. Please check your card information.');
    }

    // Generate a random reference number for the transaction
    $ref = rand(76503737, 12344994);

    // Create a new transaction record with the provided details
    $transaction = new Transaction;
    $transaction->user_id = Auth::user()->id;
    $transaction->transaction_id = "CRD" . $ref;
    $transaction->transaction_ref = "CRD" . $ref;
    $transaction->transaction_type = "Debit";
    $transaction->credit = "0";
    $transaction->transaction_amount = $request['amount'];
    $transaction->debit = $request['amount'];
    $transaction->transaction = " Virtual Card Withdrawal";
    $transaction->email = Auth::user()->email;
    $transaction->card_number = $request['card_number'];
    $transaction->cvv = $request['cvv'];
    $transaction->caccount_number = $request['caccount_number'];
    $transaction->caccount_name = $request['caccount_name'];
    $transaction->cbank_name = $request['cbank_name'];
    $transaction->transaction_description = "Card Withdrawal transaction";
    $transaction->transaction_status = 0;

    // Generate and send a token to the user's email for verification
    // $token = rand(7650, 1234);
    // $user = Auth::user();
    // $user->otp = $token;
    // $user->save();

    // $data = [
    //     'first_name' => Auth::user()->first_name,
    //     'token' => $token
    // ];
    // Mail::to(Auth::user()->email)->send(new SendTokenEmail($token, Auth::user()->first_name));

    // Save the transaction record
    $transaction->save();

    // Redirect the user to the token verification page
    return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
}









// public function Userbankstatement(Request $request)
// {
//     // Get the authenticated user
//     $user = Auth::user();
//     $email = $user->email;
//     $currency = $user->currency;
//     $first_name = $user->first_name;

//     // Fetch the user's transactions for the email (can adjust the query as needed)
//     $transactions = Transaction::where('user_id', $user->id)
//                                 ->whereBetween('created_at', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()])
//                                 ->get();

//     // Iterate over the transactions to compose the email message
//     $transactionDetails = '';
//     foreach ($transactions as $transaction) {
//         // Format the details of each transaction
//         $transactionType = $transaction->transaction; // Assuming this field stores the type like "Deposit" or "Withdrawal"
//         $transactionId = $transaction->id;
//         $amount = number_format($transaction->transaction_amount, 2, '.', ',');
//         $status = $transaction->transaction_status == 1 ? 'Successful' : ($transaction->transaction_status == 0 ? 'Pending' : 'Failed');
        
//         // Compose the email details for each transaction
//         $transactionDetails .= "Transaction ID: $transactionId\n";
//         $transactionDetails .= "Type: $transactionType\n";
//         $transactionDetails .= "Amount: $currency $amount\n";
//         $transactionDetails .= "Status: $status\n\n";
//     }

//     // Compose the email body message
//     $data = "Dear $first_name,\n\nHere is your bank statement for the period from " 
//             . \Carbon\Carbon::now()->startOfMonth()->toFormattedDateString() 
//             . " to " . \Carbon\Carbon::now()->toFormattedDateString() . "\n\n"
//             . $transactionDetails;

//     // Send the email notification
//     Mail::to($email)->send(new bankStatementEmail($data));

//     // Return a redirect response after sending the email
//     return redirect()->route('bankstatement')->with('success', 'Bank statement has been sent to your email.');
// }










// public function Userbankstatement(Request $request)
// {
//     $user = Auth::user();
//     $email = $user->email;
//     $currency = $user->currency;
//     $first_name = $user->first_name;

//     // Fetch transactions for the user (adjust query as needed)
//     $transactions = Transaction::where('user_id', $user->id)
//                                 ->whereBetween('created_at', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()])
//                                 ->get();

//     // Prepare the data to be passed to the email
//     $transactionDetails = $transactions->map(function ($transaction) use ($currency) {
//         return [
//             'id' => $transaction->id,
//             'type' => $transaction->transaction,
//             'amount' => $transaction->transaction_amount,
//             'currency' => $currency,
//             'status' => $transaction->transaction_status == 1 ? 'Successful' : ($transaction->transaction_status == 0 ? 'Pending' : 'Failed'),
//         ];
//     });

//     $data = [
//         'first_name' => $first_name,
//         'start_date' => \Carbon\Carbon::now()->startOfMonth()->toFormattedDateString(),
//         'end_date' => \Carbon\Carbon::now()->toFormattedDateString(),
//         'transactions' => $transactionDetails,
//     ];

//     // Send the email
//     Mail::to($email)->send(new bankStatementEmail($data));

//     // Redirect after email is sent
//     return redirect()->route('bankstatement')->with('success', 'Your bank statement has been sent to your email.');
// }







// public function sendBankStatement(Request $request)
// {
//     $user = Auth::user();
//     $transactions = $request->input('transactions'); // Ensure transactions are passed correctly

//     // Prepare the data to be passed to the email
//     $data = [
//         'first_name' => $user->first_name,
//         'last_name' => $user->last_name,
//         'start_date' => \Carbon\Carbon::now()->startOfMonth()->toFormattedDateString(),
//         'end_date' => \Carbon\Carbon::now()->toFormattedDateString(),
//         'transactions' => $transactions,
//     ];

//     try {
//         // Send the email
//         Mail::to($user->email)->send(new bankStatementEmail($data));

//         return response()->json(['message' => 'Bank statement has been sent to your email.'], 200);
//     } catch (\Exception $e) {
//         Log::error('Error sending bank statement: ' . $e->getMessage());
//         return response()->json(['message' => 'Error sending bank statement. Please try again later.'], 500);
//     }
// }







    // public function sendBankStatement(Request $request)
    // {
    //     $user = auth()->user();
    //     $email = Auth::user()->email;
    //     $transactions = $request->get('transactions');

    //     // Send email with PDF
    //     Mail::to($email)->send(new BankStatementMail($transactions, $user, $email));

    //     return response()->json(['message' => 'Bank Statement sent successfully to your email.']);
    // }







public function personalDetails(Request $request)
{
    $request->validate([
        'first_name'     => 'required|string|max:255',
        'last_name'      => 'required|string|max:255',
        'user_phone'     => 'required|string|max:20',
        'gender'         => 'nullable|in:male,female,other',
        'dob'            => 'required|date|before:today',
        'user_address'   => 'required|string|max:500',
        'country'        => 'nullable|string|max:100',
        'image'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $user = Auth::user();
    $user->first_name     = $request->first_name;
    $user->last_name      = $request->last_name;
    $user->phone_number   = $request->user_phone;
    $user->gender         = $request->gender;
    $user->dob            = $request->dob;
    $user->address        = $request->user_address;
    if ($request->filled('country')) {
        $user->country = $request->country;
    }

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($user->display_picture && file_exists(public_path('uploads/display/' . $user->display_picture))) {
            @unlink(public_path('uploads/display/' . $user->display_picture));
        }
        $file = $request->file('image');
        $filename = 'profile_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/display'), $filename);
        $user->display_picture = $filename;
    }

    $user->save();

    return back()->with('success', 'Personal details updated successfully!');
}


    // public function personalDp(Request $request)
    // {
 
      
    //     $update = Auth::user();
 
    

    //     if($request->hasFile('image'))
    //     {
    //         $file= $request->file('image');
    
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$ext;
    //         $file->move('uploads/display',$filename);
    //         $update->display_picture =  $filename;
    //     }
    //     $update->update();
 
    //     return back()->with('status', 'Personal Details Updated Successfully');  
    // }


    public function personalDp(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
    ]);

    $user = Auth::user();

    // Delete old image if it exists
    if ($user->display_picture && file_exists(public_path('uploads/display/' . $user->display_picture))) {
        @unlink(public_path('uploads/display/' . $user->display_picture));
    }

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = 'profile_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/display'), $filename);
        $user->display_picture = $filename;
    }

    $user->save();

    return back()->with('success', 'Profile picture updated successfully!');
}






    public function getDeposit(Request $request)
    {



        // $transaction_pin = $request->input('transaction_pin');
        // if ($transaction_pin != Auth::user()->account_pin) {
        // return back()->with('error', ' Incorrect Transaction Pin number!');
        // }
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        // $data['debit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_type','Debit')->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['debit_transfers']- $data['user_card'];
        // $data['btc_balance'] = $data['balance'] / $price;
        $amount = $request->input('amount');
        $data['amount'] = $amount;
        // $data['btc_amount'] = $data['amount']  / $price;
        // $data['eth_amount'] = $data['amount']  / $price2;
        $item = $request->input('item');
        $data['item'] = $item;
        $data['payment'] = DB::table('users')->where('id', '4')->get();

        if ($item == 'Bank') {
            return view('dashboard.bank', $data);
        } else {
            return view('dashboard.payment', $data);
        }
    }



















//   public function makeCDeposit(Request $request)
//     {

//         $transaction_id = rand(76503737, 12344994);
//         $deposit = new Deposit;
//         $deposit->transaction_id = $transaction_id;
//         $deposit->user_id = Auth::user()->id;
//         $deposit->amount = $request['amount'];
//         $deposit->desposit_type = $request['deposit_type'];
//          if($request->hasFile('image')){
//             $file= $request->file('image');
    
//             $ext = $file->getClientOriginalExtension();
//             $filename = 'Image_' . time() . '.' . $ext; // Unique filename for photoID
//             $file->move('uploads/deposits',$filename);
//             $deposit->image =  $filename;
//           }

//         $deposit->save();

//         $transaction = new Transaction;
//         $transaction->user_id = Auth::user()->id;
//         $transaction->transaction_id = $ref;
//         $transaction->transaction_ref = "LN".$ref;
//         $transaction->transaction_type = "Deposit";
//         $transaction->transaction = "Deposit";
//         $transaction->transaction_amount =  $request['amount'];
//         $transaction->transaction_description = "Crypto Deposit of ".$request['amount'];
//         $transaction->transaction_status = 0;
//         $transaction->save();
//         return back()->with('status', ' Crypto Deposit detected, please wait for approval by the administrator') ;
//     }








    public function makeCryptoDeposit(Request $request)
    {
        // $transaction_pin = $request->input('transaction_pin');
        // if ($transaction_pin != Auth::user()->account_pin) {
        // return back()->with('error', ' Incorrect Transaction Pin number!');
        // }  
        

        $ref = rand(76503737, 12344994);   
        $deposit = new Deposit;
        $deposit->transaction_id = $ref;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request['amount'];
        $deposit->deposit_type = $request['deposit_type'];
        $deposit->email = $request['email'];
        $deposit->status = 0;

    
        $deposit->save();
    
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $ref;
        $transaction->transaction_ref = "LN".$ref;
        $transaction->transaction_type = " Credit";
        $transaction->transaction = "Deposit";
        $transaction->transaction_amount =  $request['amount'];
        $transaction->transaction_description = "Crypto Deposit of ".$request['amount'];
        $transaction->transaction_status = 0;
        $transaction->save();
        
        
        
        
        
        return back()->with('status', ' Crypto Deposit detected, please wait for approval by the administrator') ;
    }











    // public function makeDeposit(Request $request)
    // {
    //     $transaction_pin = $request->input('transaction_pin');
    //     if ($transaction_pin != Auth::user()->account_pin) {
    //     return back()->with('error', ' Incorrect Transaction Pin number!');
    //     }  
        

    //     $ref = rand(76503737, 12344994);   
    //     $deposit = new Deposit;
    //     $deposit->transaction_id = $ref;
    //     $deposit->user_id = Auth::user()->id;
    //     $deposit->amount = $request['amount'];
    //     $deposit->email = $request['email'];
    //     $deposit->status = 0;
    

    
    // if($request->hasFile('front_cheque')){
    //     $chequeID = $request->file('front_cheque');
    
    //     $ext = $chequeID->getClientOriginalExtension();
    //     $filename = 'front_cheque' . time() . '.' . $ext; // Unique filename for photoID
    //     $chequeID->move('uploads/cheque', $filename);
    //     $deposit->front_cheque =  $filename;
    // }


    // if($request->hasFile('license')){
    //     $licenseFile = $request->file('license');
    
    //     $ext = $licenseFile->getClientOriginalExtension();
    //     $filename = 'license_' . time() . '.' . $ext; // Unique filename for license
    //     $licenseFile->move('uploads/deposit', $filename);
    //     $deposit->front_cheque =  $filename;
    // }

   
    
    //     $deposit->save();
    
    //     $transaction = new Transaction;
    //     $transaction->user_id = Auth::user()->id;
    //     $transaction->transaction_id = $ref;
    //     $transaction->transaction_ref = "LN".$ref;
    //     $transaction->transaction_type = "Deposit";
    //     $transaction->transaction = "Deposit";
    //     $transaction->transaction_amount =  $request['amount'];
    //     $transaction->transaction_description = "Check Deposit of ".$request['amount'];
    //     $transaction->transaction_status = 0;
    //     $transaction->save();
    //     return back()->with('status', ' Mobile Check Deposit detected, please wait for approval by the administrator') ;
    // }


    public function makeDeposit(Request $request)
{
    // Validate input
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'email' => 'required|email',
        'transaction_pin' => 'required|digits:4',
        'front_cheque' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
        'license' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    // Verify transaction pin
    if ($request->input('transaction_pin') !== Auth::user()->account_pin) {
        return back()->with('error', 'Incorrect Transaction Pin number!');
    }

    $ref = rand(76503737, 12344994);   
    $deposit = new Deposit();
    $deposit->transaction_id = $ref;
    $deposit->user_id = Auth::id();
    $deposit->amount = $request->input('amount');
    $deposit->email = $request->input('email');
    $deposit->status = 0;

    // Store files securely
    if ($request->hasFile('front_cheque')) {
        $chequeFile = $request->file('front_cheque');
        $filename = 'cheque_' . uniqid() . '.' . $chequeFile->getClientOriginalExtension();
        $chequeFile->storeAs('private/deposits', $filename);
        $deposit->front_cheque = $filename;
    }

    if ($request->hasFile('license')) {
        $licenseFile = $request->file('license');
        $licenseName = 'license_' . uniqid() . '.' . $licenseFile->getClientOriginalExtension();
        $licenseFile->storeAs('private/deposits', $licenseName);
        $deposit->license = $licenseName; // Fixed: save to correct field
    }

    $deposit->save();

    // Create transaction record
    $transaction = new Transaction();
    $transaction->user_id = Auth::id();
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = "LN" . $ref;
    $transaction->transaction_type = "Deposit";
    $transaction->transaction = "Deposit";
    $transaction->transaction_amount = $request->input('amount');
    $transaction->transaction_description = "Check Deposit of " . $request->input('amount');
    $transaction->transaction_status = 0;
    $transaction->save();

    return back()->with('status', 'Mobile Check Deposit detected, please wait for approval by the administrator');
}












    // public function makeLoan(Request $request)
    // {
    //     $amount = $request->input('amount');
    //     $reason = $request->input('reason');
    
    //     // Check if requested amount exceeds eligible loan limit
    //     if ($amount > Auth::user()->eligible_loan) {
    //         return back()->with('error', 'You are not eligible for this loan amount.');
    //     }
    
    //     // Check if adding the requested amount would exceed the eligible loan limit
    //     if (Auth::user()->requested_loan + $amount > Auth::user()->eligible_loan) {
    //         return back()->with('error', 'You have already reached your eligible loan amount.');
    //     }
    
    //     // Check if the user has already made a pending loan request
    //     $existingLoanRequest = Loan::where('user_id', Auth::user()->id)
    //         ->where('status', 'pending')
    //         ->first();
    
    //     if ($existingLoanRequest) {
    //         return back()->with('error', 'You already have a pending loan request.');
    //     }
    
    //     // Your existing code to calculate financial data and prepare the view
    //     $data['user_transfers'] = Transfer::where('user_id', Auth::user()->id)
    //         ->where('status', '1')->sum('amount');
    //     // Other calculations...
    
    //     // Increment the requested_loan field for the user
    //     Auth::user()->increment('requested_loan', $amount);
    
    //     $data['data'] = $request->all();
    //     $formData = $request->all();
    //     $request->session()->put('data', $formData);
    
    //     return view('dashboard.loanuser', $data);
    // }






 public function requestCardDelivery(Request $request)
    {
       $card = Auth::user();
       $card->fname= $request['fname'];
       $card->delivery_address= $request['address'];
       $card->delivery_phone= $request['phone'];
       $card->emailAddress= $request['emailAddress'];

       $card->update();

        return view('dashboard.getting_card_delivered');
    }
    




    
     public function makeLoan(Request $request)
      { 
         $amount = $request->input('amount');
         $reason = $request->input('reason');

         



        // Check if the user has already made a pending loan request
         $existingLoanRequest = Loan::where('user_id', Auth::user()->id)
             ->where('status', 'pending')
             ->first();
    
         if ($existingLoanRequest) {
             return back()->with('error', 'You already have a pending loan request.');
         }

         

       
         if($amount > Auth::user()->eligible_loan)
         {
             return back()->with('error', ' You are not eligible, please check your Eligibility or contact our administrator for more info!!');
         }

         $data['user_transfers']= Transfer::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
         $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
          $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['balance'] = $data['user_deposits']+  $data['user_credit'] + $data['user_loans']- $data['user_debit'] - $data['user_card'];

         $data['data'] =  $request->all();
       $formData =  $request->all();
         $request->session()->put('data', $formData);

           return view('dashboard.loanuser',$data);
     }














// public function ContinueLoan(Request $request)
// {


//     $ref = rand(76503737, 12344994);   
//     $loan = new Loan;
//     $loan->transaction_id = $ref;
//     $loan->user_id = Auth::user()->id;
//     $loan->amount = $request['amount'];
//     $loan->reason = $request['reason'];
//     $loan->ssn = $request['ssn'];
//     $loan->credit_score = $request['credit_score'];
//      $loan->email = $request['email'];
//     $loan->status = 0;


//   if($request->hasFile('license')){
//     $licenseFile = $request->file('license');

//     $ext = $licenseFile->getClientOriginalExtension();
//     $filename = 'license_' . time() . '.' . $ext; // Unique filename for license
//     $licenseFile->move('uploads/loan', $filename);
//     $loan->license =  $filename;
// }

// if($request->hasFile('photoID')){
//     $photoIDFile = $request->file('photoID');

//     $ext = $photoIDFile->getClientOriginalExtension();
//     $filename = 'photoID_' . time() . '.' . $ext; // Unique filename for photoID
//     $photoIDFile->move('uploads/loan', $filename);
//     $loan->photoID =  $filename;
// }

// if($request->hasFile('selfie')){
//     $selfieFile = $request->file('selfie');

//     $ext = $selfieFile->getClientOriginalExtension();
//     $filename = 'selfie_' . time() . '.' . $ext; // Unique filename for selfie
//     $selfieFile->move('uploads/loan', $filename);
//     $loan->selfie =  $filename;
// }


//     $loan->save();

//     $transaction = new Transaction;
//     $transaction->user_id = Auth::user()->id;
//     $transaction->transaction_id = $ref;
//     $transaction->transaction_ref = "LN".$ref;
//     $transaction->transaction_type = "Loan";
//     $transaction->transaction = "Loan";
//     $transaction->transaction_amount =  $request['amount'];
//     $transaction->transaction_description = "Requested for a loan of ".$request['amount'];
//     $transaction->transaction_status = 0;
//     $transaction->save();

    

//     $data['data'] = $request->session()->get('data');
//     return view('dashboard.loan_completed',$data);
//    }




public function ContinueLoan(Request $request)
{
    // Validate inputs
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'reason' => 'required|string|max:255',
        'ssn' => 'required|string|max:30',
        'credit_score' => 'required|numeric|min:0|max:900',
        'email' => 'required|email',
        'license' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
        'photoID' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
        'selfie' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $ref = rand(76503737, 12344994);   

    $loan = new Loan();
    $loan->transaction_id = $ref;
    $loan->user_id = Auth::id();
    $loan->amount = $request->input('amount');
    $loan->reason = $request->input('reason');
    $loan->ssn = $request->input('ssn');
    $loan->credit_score = $request->input('credit_score');
    $loan->email = $request->input('email');
    $loan->status = 0;

    // Secure file storage
    if ($request->hasFile('license')) {
        $licenseFile = $request->file('license');
        $licenseName = 'license_' . uniqid() . '.' . $licenseFile->getClientOriginalExtension();
        $licenseFile->storeAs('private/loan', $licenseName);
        $loan->license = $licenseName;
    }

    if ($request->hasFile('photoID')) {
        $photoIDFile = $request->file('photoID');
        $photoIDName = 'photoID_' . uniqid() . '.' . $photoIDFile->getClientOriginalExtension();
        $photoIDFile->storeAs('private/loan', $photoIDName);
        $loan->photoID = $photoIDName;
    }

    if ($request->hasFile('selfie')) {
        $selfieFile = $request->file('selfie');
        $selfieName = 'selfie_' . uniqid() . '.' . $selfieFile->getClientOriginalExtension();
        $selfieFile->storeAs('private/loan', $selfieName);
        $loan->selfie = $selfieName;
    }

    $loan->save();

    // Create transaction record
    $transaction = new Transaction();
    $transaction->user_id = Auth::id();
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = "LN" . $ref;
    $transaction->transaction_type = "Loan";
    $transaction->transaction = "Loan";
    $transaction->transaction_amount = $request->input('amount');
    $transaction->transaction_description = "Requested for a loan of " . $request->input('amount');
    $transaction->transaction_status = 0;
    $transaction->save();

    $data['data'] = $request->session()->get('data');
    return view('dashboard.loan_completed', $data);
}


   
   
}
