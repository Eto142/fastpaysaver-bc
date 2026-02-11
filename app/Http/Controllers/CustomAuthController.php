<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Models\Credit;
use App\Events\NewUser;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\Trade;
use App\Models\Transaction;
use App\Mail\welcomeEmail;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    } 
   
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           

        return response()->json([
            "content" => 'Successful',
            "message" => 'Login Successful', 
            "redirect" => url("dashboard")
        ]);
     
        } else {
            return response()->json([
                "content" => 'Error',
                "message" => "Invalid credentials",
                "redirect" => url("login")
            ]); 
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.register');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'account_type' => 'required',
            'currency' => 'required',
            'account_pin' => 'required|digits:4',
            'password' => 'string|required|confirmed|min:3',
        ]);
           
       
        $data = $request->all();
        $check = $this->create($data);
   

        $email = $request['email'];

        //$user_data['email'] = $request['email'];
       

        $validToken = rand(1234, 7650);
        $userData = User::where('email', $email)->first();
        $userData->token = $validToken;
        $userData->save();


    
        Mail::to($email)->send(new VerificationEmail($validToken));
        
        return redirect("verify/".$userData->id);

                 
     
    }

    public function resendCode($id)
    {
        
        $userData = User::where('id',$id)->first();
        $email = $userData->email;

        $validToken = rand(1234, 7650);
        $userData->token = $validToken;
        $userData->save();


    
        Mail::to($email)->send(new VerificationEmail($validToken));
       
        
        return redirect("verify/".$userData->id)->with('message','verification code has been resent to your email');


    }

    public function create(array $data)
    {
       $accountNumber = rand(1645566556, 5575755768);
       return User::create([
        'first_name' => $data['name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'address' => $data['address'],
        'phone_number' => $data['phone'],
        'country' => $data['country'],
        'account_type' => $data['account_type'],
        'currency' => $data['currency'],
        'account_pin' => $data['account_pin'],
        'a_number' => $accountNumber,
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            if(Auth::user()->user_type=='1')
            {
             $result = DB::table('users')->where('user_type','0')->get();
             return view('admin.home',compact('result'));
            } else{

               
                if(Auth::user()->is_activated=='1')
                {  

         $data['transaction'] = Transaction::where('user_id', Auth::user()->id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
         $data['trades'] = Trade::where('user_id', Auth::user()->id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();                               
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['user_debit'] - $data['debit_transfers']- $data['user_card'];
                    return view('dashboard.home',$data);
                }else{
                 
                    return redirect("verify/".Auth::user()->id);
                }
            }
            
            
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    // public function adminHome()
    // {

    //     return view('admin.home');
 
    // }
    
    public function signOut() {
        Session::flush();
        Auth::logout();

        $response = ['content' => 'Logout Successful'];
     

        return response()->json($response);
  
     
    }

    public function UserlogOut(Request $request)
{
    // Log the user out
    Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate CSRF token
    $request->session()->regenerateToken();

    // Redirect to login page (adjust the route name if different)
    return redirect()->route('login')->with('status', 'You have been logged out.');
}



    public function logOut() {
        Session::flush();
        Auth::logout();

        return redirect("login")->with('Message', 'Your account has been verified Successfully.');
  
     
    }

    public function verify($id)
    {
        $user = User::where('id',$id)->first();
        $data['email'] = $user->email;
        $data['hash'] = $user->password;
        $data['id'] = $user->id;
      
        return view('auth.verify',$data);
    } 

    
    public function emailVerify(Request $request)
    {
        $get_token = $request->input('digit');
        $user = User::where('token', $get_token)->first();
        
        if ($user) {
            $user->is_activated = 1;
            $user->token = null;
            $user->save();
            
            $data = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'a_number' => $user->a_number,
                'email' => $user->email,
                'password' => '*********',
            ];
        
            Mail::to($user->email)->send(new welcomeEmail($data));
            
            Auth::login($user);
            
            return redirect("dashboard")->with('status', 'Your account has been verified Successfully, you can now login');

        } else {
            return back()->with('error', 'Incorrect Activation Code!');
        }
    }



    
}
