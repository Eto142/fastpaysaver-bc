<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TradeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes are organized into logical groups:
| 1. Public pages (no auth required)
| 2. Guest-only routes (login, register)
| 3. Email verification (no auth required)
| 4. Authenticated user routes (require login)
| 5. Admin routes → see routes/admin.php
|
*/

// =========================================================================
// 1. PUBLIC PAGES
// =========================================================================

Route::get('/', fn () => view('home.homepage'));
Route::get('/about', fn () => view('home.about'));
Route::get('/contact', fn () => view('home.contact'));
Route::get('/terms', fn () => view('home.terms'));
Route::get('/faq', fn () => view('home.faq'));

Route::get('/ultimate', fn () => view('home.ultimate'));
Route::get('/health-saving', fn () => view('home.health-saving'));
Route::get('/individual-retirement', fn () => view('home.individual-retirement'));
Route::get('/overdraft-protection', fn () => view('home.overdraft-protection'));

Route::get('/business-essential', fn () => view('home.business-essential'));
Route::get('/business-savings', fn () => view('home.business-savings'));
Route::get('/personal', fn () => view('home.personal'));
Route::get('/business', fn () => view('home.business'));

Route::get('/credit-card', fn () => view('home.credit-card'));
Route::get('/loans', fn () => view('home.loans'));
Route::get('/commercial-real', fn () => view('home.commercial-real'));


// =========================================================================
// 2. GUEST ROUTES
// =========================================================================

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

    Route::get('forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
});


// =========================================================================
// 3. EMAIL VERIFICATION
// =========================================================================

Route::get('verify/{id}', [VerificationController::class, 'show'])->name('verify');
Route::post('email-verify', [VerificationController::class, 'verify'])->name('verify.submit');
Route::get('resend-code/{id}', [VerificationController::class, 'resend'])->name('verify.resend');


// =========================================================================
// 4. AUTHENTICATED USER ROUTES
// =========================================================================

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');

    // Profile & Settings
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('user-profile', [DashboardController::class, 'userProfile'])->name('user.profile');
    Route::post('personal-details', [DashboardController::class, 'personalDetails'])->name('personal.details');
    Route::post('personal-dp', [DashboardController::class, 'personalDp'])->name('personal.dp');
    Route::get('settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('change-password', [DashboardController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('change-password', [DashboardController::class, 'updatePassword'])->name('update-password');

    // Notifications & Transactions
    Route::get('notification', [DashboardController::class, 'notification'])->name('notification');
    Route::get('transactions', [DashboardController::class, 'transactions'])->name('transactions');
    Route::get('transaction-history', [DashboardController::class, 'transactionHistory'])->name('transaction.history');
    Route::get('view_invoice/{user_id}', [DashboardController::class, 'viewInvoice'])->name('view.invoice');

    // Bank Statement
    Route::get('bankstatement', [DashboardController::class, 'bankstatement'])->name('bankstatement');
    Route::post('send-bank-statement', [DashboardController::class, 'sendBankStatement'])->name('send.bank.statement');

    // Transfers
    Route::get('transfer', [DashboardController::class, 'transferPage'])->name('transfer.page');
    Route::get('pending-transfer', [DashboardController::class, 'pendingTransfer'])->name('pending-transfer');
    Route::get('withdrawal-completed', [DashboardController::class, 'Completed'])->name('withdrawal_completed');

    // Bank Transfer
    Route::get('bank', [DashboardController::class, 'bank'])->name('bank');
    Route::get('bank-transfer-step1', [DashboardController::class, 'showStep1'])->name('bank.transfer.step1');
    Route::post('bank-transfer-step2', [DashboardController::class, 'showStep2'])->name('bank.transfer.step2');
    Route::post('bank-transfer', [DashboardController::class, 'bankTransfer'])->name('bank.transfer');

    Route::get('international-transfer', [DashboardController::class, 'internationalTransfer'])->name('international-transfer');
    Route::get('domestic-transfer', [DashboardController::class, 'domesticTransfer'])->name('domestic-transfer');

    // PayPal
    Route::get('paypal', [DashboardController::class, 'paypal'])->name('paypal');
    Route::post('paypal-transfer', [DashboardController::class, 'paypalTransfer'])->name('paypal.transfer');

    // Skrill
    Route::get('skrill', [DashboardController::class, 'skrill'])->name('skrill');
    Route::post('skrill-transfer', [DashboardController::class, 'skrillTransfer'])->name('skrill.transfer');

    // Crypto
    Route::get('crypto', [DashboardController::class, 'crypto'])->name('crypto');
    Route::get('cryptopage', [DashboardController::class, 'cryptopage'])->name('cryptopage');
    Route::get('crypto_deposit', [DashboardController::class, 'cryptoDeposit'])->name('crypto_deposit');
    Route::get('cfx', [DashboardController::class, 'Cfx'])->name('cfx');
    Route::post('crypto-transfer', [DashboardController::class, 'cryptoTransfer'])->name('crypto.transfer');
    Route::post('make-cryptodeposit', [DashboardController::class, 'makeCryptoDeposit'])->name('make.cryptodeposit');

    // Card
    Route::get('card', [DashboardController::class, 'card'])->name('card');
    Route::get('card_withdrawal', [DashboardController::class, 'CardWithdrawal'])->name('card_withdrawal');
    Route::post('card-transfer', [DashboardController::class, 'cardTransfer'])->name('card.transfer');
    Route::get('request-card/{user_id}', [DashboardController::class, 'requestCard'])->name('request.card');
    Route::post('requestcard-delivery', [DashboardController::class, 'requestCardDelivery'])->name('requestcard.delivery');

    // Deposits
    Route::get('deposit', [DashboardController::class, 'deposit'])->name('deposit');
    Route::post('get-deposit', [DashboardController::class, 'getDeposit'])->name('get.deposit');
    Route::post('make-deposit', [DashboardController::class, 'makeDeposit'])->name('make.deposit');
    Route::post('make-cdeposit', [DashboardController::class, 'makeCDeposit'])->name('make.cdeposit');

    // Loans
    Route::get('loan', [DashboardController::class, 'loan'])->name('loan');
    Route::get('loan-user', [DashboardController::class, 'LoanUser'])->name('loan-user');
    Route::post('make-loan', [DashboardController::class, 'makeLoan'])->name('make.loan');
    Route::post('continue-loan', [DashboardController::class, 'ContinueLoan'])->name('continue.loan');

    // Bills
    Route::get('paybills', [DashboardController::class, 'paybills'])->name('paybills');
    Route::post('make-payment', [DashboardController::class, 'makePayment'])->name('make.payment');

    // OTP & Token
    Route::get('token', [DashboardController::class, 'token'])->name('token.page');
    Route::post('otp-pin', [DashboardController::class, 'UserOtp'])->name('otp.pin');

    // KYC
    Route::post('upload-kyc', [DashboardController::class, 'uploadKyc'])->name('upload.kyc');

    // NFT
    Route::post('save_nft', [DashboardController::class, 'saveNft'])->name('save.nft');

    // Ticket
    Route::get('ticket', [DashboardController::class, 'ticket'])->name('ticket');

    // Trades
    Route::post('trades', [TradeController::class, 'store'])->name('trades.store');
    Route::get('api/trades', [TradeController::class, 'history'])->name('trades.history');
});

