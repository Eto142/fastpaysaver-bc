<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Nft;
use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Models\Credit;
use App\Models\Trade;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Mail\DebitEmail;
use App\Models\Transfer;
use App\Mail\CreditEmail;
use App\Mail\approveLoanEmail;
use App\Mail\approveTransactionEmail;
use App\Mail\declineTransactionEmail;
use App\Mail\approveEmail;
use App\Mail\approveDepositEmail;
use App\Mail\declineDepositEmail;
use App\Mail\declineLoanEmail;
use App\Mail\approveCardEmail;
use App\Mail\declineCardEmail;
use App\Mail\sendUserEmail;
use App\Mail\nftUserEmail;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;



class SendMailController extends Controller
{
     public function sendMail(Request $request)

    {

        

            $email = $request->input('email');
            //$subject = $request->input('subject');
            $data = [
                'message' => $request->message,
                'subject' => $request->subject,
            ];


            Mail::to($email)->send(new sendUserEmail($data));

            return back()->with('status', 'Email Successfully sent');
        
    }
}
