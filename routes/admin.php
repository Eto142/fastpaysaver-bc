<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All admin panel routes. Loaded with the 'web' middleware,
| 'admin' prefix, and 'admin.' route name prefix.
|
| URL:   /admin/...
| Name:  admin....
|
*/

// =========================================================================
// Guest Routes (admin login page)
// =========================================================================

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
});


// =========================================================================
// Authenticated Admin Routes
// =========================================================================

Route::middleware('auth:admin')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AdminController::class, 'admindashboard'])->name('dashboard');

    // -----------------------------------------------------------------
    // User Management
    // -----------------------------------------------------------------
    Route::get('manage-users', [AdminController::class, 'ManageUsers'])->name('manage.users');
    Route::get('users', [AdminController::class, 'users'])->name('view.users');
    Route::get('profile/{id}', [AdminController::class, 'userProfile'])->name('profile');
    Route::delete('delete/{id}', [AdminController::class, 'deleteUser'])->name('delete');

    // User Data
    Route::get('user_transactions', [AdminController::class, 'usersTransaction'])->name('user.transaction');
    Route::get('user_investments', [AdminController::class, 'userInvestment'])->name('user.investment');
    Route::get('user_cards', [AdminController::class, 'userCards'])->name('user.cards');
    Route::get('user_loans', [AdminController::class, 'usersLoans'])->name('user.loans');

    // -----------------------------------------------------------------
    // Credit & Debit
    // -----------------------------------------------------------------
    Route::post('credit-user', [AdminController::class, 'creditUser'])->name('credit.user');
    Route::post('debit-user', [AdminController::class, 'debitUser'])->name('debit.user');

    // -----------------------------------------------------------------
    // User Status Toggles
    // -----------------------------------------------------------------
    Route::match(['get', 'post'], 'verify_user/{id}', [AdminController::class, 'verifyUser'])->name('verify_user');
    Route::match(['get', 'post'], 'unfreeze_user/{id}', [AdminController::class, 'unfreezeUser'])->name('unfreeze_user');
    Route::match(['get', 'post'], 'user_activity/{id}', [AdminController::class, 'UserActivity'])->name('user_activity');
    Route::match(['get', 'post'], 'iuser_activity/{id}', [AdminController::class, 'iUserActivity'])->name('iuser_activity');
    Route::match(['get', 'post'], 'user_block/{id}', [AdminController::class, 'UserBlock'])->name('user_block');
    Route::match(['get', 'post'], 'iuser_block/{id}', [AdminController::class, 'iUserBlock'])->name('iuser_block');

    // -----------------------------------------------------------------
    // User Data Updates
    // -----------------------------------------------------------------
    Route::post('update_otp/{id}', [AdminController::class, 'updateOtp'])->name('update.otp');
    Route::post('update_eligible/{id}', [AdminController::class, 'updateEligibleLoan'])->name('update.eligible');
    Route::post('update_email/{id}', [AdminController::class, 'updateEmail'])->name('update.email');
    Route::post('update_ssn/{id}', [AdminController::class, 'updateSsn'])->name('update.ssn');

    // -----------------------------------------------------------------
    // Admin Password
    // -----------------------------------------------------------------
    Route::get('change-password', [AdminController::class, 'adminChangePassword'])->name('change.password');
    Route::post('update-password', [AdminController::class, 'adminUpdatePassword'])->name('update.password');

    // -----------------------------------------------------------------
    // KYC Approval
    // -----------------------------------------------------------------
    Route::post('approve-id/{id}', [AdminController::class, 'ApproveId'])->name('approve.id');
    Route::post('accept-kyc/{id}', [AdminController::class, 'acceptKyc'])->name('accept-kyc');
    Route::post('decline-kyc/{id}', [AdminController::class, 'rejectKyc'])->name('decline-kyc');

    // -----------------------------------------------------------------
    // Deposit Approval
    // -----------------------------------------------------------------
    Route::post('approve-deposit/{id}', [AdminController::class, 'ApproveDeposit'])->name('approve-deposit');
    Route::post('decline-deposit/{id}', [AdminController::class, 'DeclineDeposit'])->name('decline-deposit');

    // -----------------------------------------------------------------
    // Loan Approval
    // -----------------------------------------------------------------
    Route::post('approve-loan/{id}', [AdminController::class, 'ApproveLoan'])->name('approve-loan');
    Route::post('decline-loan/{id}', [AdminController::class, 'DeclineLoan'])->name('decline-loan');

    // -----------------------------------------------------------------
    // Card Approval
    // -----------------------------------------------------------------
    Route::post('approve-card/{id}', [AdminController::class, 'ApproveCard'])->name('approve-card');
    Route::post('decline-card/{id}', [AdminController::class, 'DeclineCard'])->name('decline-card');

    // -----------------------------------------------------------------
    // Transaction Management
    // -----------------------------------------------------------------
    Route::post('approve-transaction/{id}', [AdminController::class, 'ApproveTransaction'])->name('approve-transaction');
    Route::post('decline-transaction/{id}', [AdminController::class, 'DeclineTransaction'])->name('decline-transaction');
    Route::post('update-transaction-date/{id}', [AdminController::class, 'updateTransactionDate'])->name('update-transaction-date');

    // -----------------------------------------------------------------
    // Payment Wallets
    // -----------------------------------------------------------------
    Route::get('update-wallet', [AdminController::class, 'updateWallet'])->name('wallet');
    Route::post('choose-wallet', [AdminController::class, 'chooseWallet'])->name('choose.wallet');
    Route::post('update-trc', [AdminController::class, 'updateTrc'])->name('update-trc');
    Route::post('update-btc', [AdminController::class, 'updateBtc'])->name('update-btc');
    Route::post('update-eth', [AdminController::class, 'updateEth'])->name('update-eth');

    // -----------------------------------------------------------------
    // NFT
    // -----------------------------------------------------------------
    Route::get('upload-nft', [AdminController::class, 'uploadNft'])->name('admin.upload.nft');
    Route::post('save-nft', [AdminController::class, 'adminSaveNft'])->name('admin.save.nft');
    Route::get('uploaded-nfts', [AdminController::class, 'allNfts'])->name('users.uploaded.nft');
    Route::get('nft-market', [AdminController::class, 'nftMarket'])->name('admin.buy.nft');

    // -----------------------------------------------------------------
    // Admin Mail
    // -----------------------------------------------------------------
    Route::get('send-mail/{id}', [AdminController::class, 'sendUserMail'])->name('send-user-mail');
    Route::post('send-user-email', [AdminController::class, 'sendUserEmail'])->name('send-user-email');
    Route::get('send-test-mail', [AdminController::class, 'sendTestMail'])->name('user.mail');
});
