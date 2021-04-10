<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Laravel Auth Package Routes
Auth::routes();
Auth::routes(['verify' => true]);

// Home Route
Route::get('/', 'HomeController@index')->name('welcome');

// Currency List Route
Route::post('/getCurrencyList', 'HomeController@getCurrencyList')->name('home.getCurrencyList');

// Language Route
Route::get('lang/{code}','HomeController@lang')->name('lang');

// Withdraw Route
Route::post('/withdrawCheck', 'HomeController@withdrawCheck')->name('home.getstarted');
Route::post('/withdrawMethod', 'HomeController@withdrawMethod')->name('home.withdrawMethod');

// Login, Logout & Subscribe Route
Route::get('/admin/login', 'Admin\LoginController@login')->name('admin.login');
Route::get('/admin/logout', 'Auth\LoginController@logout', 'logout')->name('admin.logout');
Route::get('/logout', 'User\LoginController@logout', 'logout')->name('logout');
Route::post('/subscribe', 'HomeController@subscribe')->name('newsletter');

// User Auth Routes
Route::get('/register', 'User\LoginController@register_form')->name('register');
Route::get('/fdr/request/activate', 'Admin\FixeddepositController@fdr_request_activate')->name('fdr.activate');
Route::get('/cron/work', 'Admin\FixeddepositController@fdr_request_activate')->name('fdr.activate');

// Phone Verification Routes
Route::get('phone-verification', 'User\LoginController@phone_verification')->name('phone.verification')->middleware('auth');
Route::post('phone-verification-check', 'User\LoginController@phone_verification')->name('phone.verification.check');
Route::get('phone-verification-view', 'User\LoginController@otp_view')->name('phone.verification.view');
Route::get('phone-verification-show', 'User\LoginController@otp_view')->name('phone.verification.show')->middleware('auth');
Route::post('phone-verification-resend', 'User\LoginController@phone_verification_resend')->name('phone.verification.resend')->middleware('auth');

// Register Route
Route::post('/register', 'User\LoginController@register')->name('register');

// User OTP Send Route
Route::get('/user/otp', 'Admin\UserController@userOtp')->name('user.otp');
Route::post('/user/otp', 'Admin\UserController@userOtp')->name('user.otp.resend');
Route::get('/user/otp-view', 'Admin\UserController@userOtpView')->name('user.otp.view');
Route::get('/profile/otp', 'Admin\UserController@profileOtp')->name('profile.otp');
Route::post('/profile/otp', 'Admin\UserController@profileOtp')->name('profile.otp.resend');
Route::get('/profile/otp-view', 'Admin\UserController@profileOtpView')->name('profile.otp.view');
Route::post('/profile/otp/confirmation', 'Admin\UserController@profileOtpConfirmation')->name('profile.otp.confirmation');
Route::post('/user/otp/confirmation', 'Admin\UserController@userOtpConfirmation')->name('login.otp.confirmation');
 
// News Routes
Route::get('news/{slug}','BlogController@show')->name('blog.show');
Route::get('news/data/search','BlogController@search')->name('blog.search');
Route::get('news','BlogController@news')->name('news');

// Page Show Route
Route::get('page/{slug}','PageController@show')->name('page.show');

// Services Routes
Route::get('services','ServicesController@index')->name('service.index');
Route::get('service/{slug}','ServicesController@show')->name('service.show');

// Contact Form Routes
Route::get('contact','ContactController@index')->name('contact.index');
Route::post('contact','ContactController@send')->name('contact.send');



//**========================================== Admin Route Group ===============================================**//

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {

    // Admin Dashboard Route
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('dashboard-info', 'DashboardController@statistics')->name('dashboard.statistics');

    // Roles Route
	Route::resource('role', 'RoleController');
	Route::post('roles/destroy', 'RoleController@destroy')->name('roles.destroy');

	// Admin Route
	Route::resource('admin', 'AdminController');
	Route::post('/admins/destroy', 'AdminController@destroy')->name('admins.destroy');
   
	// Menu Route
	Route::resource('menu', 'MenuController');
    Route::post('/menus/destroy', 'MenuController@destroy')->name('menus.destroy');
    Route::post('menues/node', 'MenuController@MenuNodeStore')->name('menus.MenuNodeStore');
   
    // System Envrionment Settings Route
    Route::get('setting/env', 'EnvController@index');
    Route::post('env-update', 'EnvController@store')->name('env.store');

    // Seo Settings Route
    Route::resource('setting/seo', 'SeoController');

    // Bank Deposit Route
    Route::resource('bank_deposit', 'BankDepositController');
    Route::get('bank-deposit/approve_manual_deposit', 'BankDepositController@approve_manual_deposit')->name('approve_manual_deposit');
    Route::get('bank-deposit/reject_manual_deposit', 'BankDepositController@reject_manual_deposit')->name('reject_manual_deposit');
    Route::get('bank-deposit/pending_manual_deposit', 'BankDepositController@pending_manual_deposit')->name('pending_manual_deposit');
    Route::get('bank-deposits/{id}', 'BankDepositController@deposit_view')->name('manual_deposit_view');

    // Manual Deposit Route
    Route::get('manual_deposit/search/', 'BankDepositController@manualDepositSearch')->name('manual_deposit.search');
    Route::get('manual_deposit_approve/search/', 'BankDepositController@manualDepositSearchApprove')->name('manual_deposit.approve.search');
    Route::get('manual_deposit_reject/search/', 'BankDepositController@manualDepositSearchReject')->name('manual_deposit.reject.search');
    Route::get('manual_deposit_pending/search/', 'BankDepositController@manualDepositSearchPending')->name('manual_deposit.pending.search');

    Route::post('manual_deposit/approve/{id}', 'BankDepositController@manualDepositeUpdate')->name('manual_deposit.update');

    // Manual Gateway Crud Route
    Route::get('manual_gateway', 'BankDepositController@manual_gateway')->name('manual_gateway');
    Route::get('manual_gateway/create', 'BankDepositController@manualGatewayCreate')->name('manual_gateway.create');
    Route::post('manual_gateway/store', 'BankDepositController@manualGatewayStore')->name('manual_gateway.store');
    Route::get('manual_gateway/edit/{id}', 'BankDepositController@manualGatewayEdit')->name('manual_gateway.edit');
    Route::put('manual_gateway/update/{id}', 'BankDepositController@manualGatewayUpdate')->name('manual_gateway.update');
    Route::delete('manual_gateway/delete/{id}', 'BankDepositController@manualGatewayDelete')->name('manual_gateway.delete');
    

    // Latest News Route
    Route::resource('latest_news', 'LatestNewsController');

    //Transaction Route
    Route::resource('transaction', 'TransactionController');

    // Other Bank Route
    Route::get('bank_withdraw/bank_transactions_approved', 'TransactionController@bank_transaction_approved')->name('bank_transaction_approved');
    Route::get('bank_withdraw/bank_transaction_rejected', 'TransactionController@bank_transaction_rejected')->name('bank_transaction_rejected');
    Route::get('bank_withdraw/bank_transactions_approved/search', 
    'TransactionController@bank_transaction_approved_search')->name('bank_transaction_approved.search');
    Route::get('bank_withdraw/bank_transaction_rejected/search', 'TransactionController@bank_transaction_rejected_search')->name('bank_transaction_rejected.search');
    Route::get('bank_withdraw/bank_transaction_request/search', 'TransactionController@bank_transaction_request_search')->name('bank_transaction_request.search');
    Route::get('bank_withdraw/bank_transaction_request', 'TransactionController@bank_transaction_request')->name('bank_transaction_request');
    Route::get('bank-transaction/view/{id}', 'TransactionController@bank_transaction_view')->name('bank_transaction_view');
    Route::get('bank-transaction/approved/{id}', 'TransactionController@bankTransactionApproved')->name('bank.transaction.approved');
    Route::delete('bank-transaction/rejected/{id}', 'TransactionController@bankTransactionRejected')->name('bank.transaction.rejected');

    // All Transaction Route
    Route::get('all/transaction', 'TransactionController@allTransaction')->name('all.transaction');
    Route::get('all/bills', 'TransactionController@allBills')->name('bills');
    Route::get('all/bills-search', 'TransactionController@allBillSearch')->name('bill.search');
    Route::get('all/transaction/view/{id}', 'TransactionController@allTransactionView')->name('all.transaction.view');
    Route::get('all/transaction/search/report', 'TransactionController@allTransactionSearchReport')->name('all.transaction.search.report');
    Route::get('all/transaction/trx/report', 'TransactionController@allTransactionTrxReport')->name('all.transaction.trx.report');

    // Own Bank Routes
    Route::get('ownbank/', 'TransactionController@ownbankTransactions')->name('ownbank.transactions');
    Route::get('ownbank/view/{id}', 'TransactionController@ownbankView')->name('ownbank.view');
    Route::get('ownbank/search', 'TransactionController@ownbankSearch')->name('ownbank.search');
    
    // Withdraw Route 
    Route::resource('withdraw', 'WithdrawController');
    Route::get('withdraw-view/{id}', 'WithdrawController@bankwithdrawView')->name('withdraw.request.view');
    Route::get('withdraw/allrequest/search', 'WithdrawController@withdrawSearch')->name('withdraw.search');
    Route::get('withdraw/request-approved/search', 'WithdrawController@withdrawSearchApproved')->name('withdraw.approved.search');
    Route::get('withdraw/request-rejected/search', 'WithdrawController@withdrawSearchRejected')->name('withdraw.rejected.search');
    Route::get('withdraw/approved/{id}', 'WithdrawController@withdrawApproved')->name('withdraw.request.approved');
    Route::get('withdraw/rejected/{id}', 'WithdrawController@withdrawRejected')->name('withdraw.request.rejected');

    // E-currency Requests Route
    Route::get('e-currency/withdraw_request', 'WithdrawController@withdraw_request')->name('withdraw_request');
    Route::get('e-currency/approved_withdraw', 'WithdrawController@approved_withdraw')->name('approved_withdraw');
    Route::get('e-currency/rejected_withdraw', 'WithdrawController@rejected_withdraw')->name('rejected_withdraw');

    // User Management Route
    Route::resource('users', 'UserController');
    Route::get('users/verified_users/index', 'UserController@verified_users')->name('verified_users');
    Route::get('profile/{id}', 'UserController@profile')->name('profile');
    Route::get('profile/edit/{id}', 'UserController@profile_edit')->name('profile.edit');
    Route::put('profile/update/{id}', 'UserController@profile_update')->name('profile.update');
    Route::get('users/banded_users/index', 'UserController@banded_users')->name('banded_users');
    Route::get('users/email_unverified/index', 'UserController@email_unverified')->name('email_unverified');
    Route::get('users/mobile_unverified/index', 'UserController@mobile_unverified')->name('mobile_unverified');
    Route::post('user/search/resuit', 'UserController@userSearchResuit')->name('user.search');
    Route::put('user/credits/{id}', 'UserController@userCredits')->name('user.credits');
    Route::put('user/transactions/mail/{id}', 'UserController@userTransactionMail')->name('user.transaction.mail');
    Route::get('user/login/{id}', 'UserController@userLogin')->name('user.login');
    Route::get('user/report/{type}/{id}', 'UserController@transactionReport')->name('user.transaction.report');
    Route::get('user/pdf/{type}/{id}', 'UserController@createPDF')->name('user.transaction.pdf');

    // Branch Route
    Route::resource('branch', 'BranchController');

    // Others Bank Route
    Route::resource('others-bank', 'OtherbankController');

    // Loan Management Route
    Route::resource('loan', 'LoanmanagementController');
    Route::get('loan/package/index', 'LoanmanagementController@loanPackage')->name('loan.package');
    Route::get('loan/request/show/{id}', 'LoanmanagementController@loanRequestShow')->name('loan.request.show');
    Route::get('loan/request/index', 'LoanmanagementController@loanRequest')->name('loan.request');
    Route::get('loan/request/search', 'LoanmanagementController@loanSearch')->name('loan.search');
    Route::get('loan/approved/search', 'LoanmanagementController@loanApprovedSearch')->name('loan.approved.search');
    Route::get('loan/rejected/search', 'LoanmanagementController@loanRejectedSearch')->name('loan.rejected.search');
    Route::get('loans/request/approved/{id}', 'LoanmanagementController@loanRequestApproved')->name('loan.request.approved');
    Route::get('loans/request/rejected/{id}', 'LoanmanagementController@loanRequestRejected')->name('loan.request.rejected');
    Route::get('loan/request/approved/index', 'LoanmanagementController@loanApprovedIndex')->name('loan.approved.index');
    Route::get('loan/request/rejected/index', 'LoanmanagementController@loanRejectedIndex')->name('loan.rejected.index');
    Route::get('loan/request/return', 'LoanmanagementController@loanReturn')->name('loan.return.index');

    // Fixed Deposit Route
    Route::resource('fixed-deposit', 'FixeddepositController');
    Route::get('fixed-deposit/package/index', 'FixeddepositController@fixedDepositPackage')->name('fixed.deposit.package');
    Route::get('fixed-deposit/request/index', 'FixeddepositController@fixedDepositRequest')->name('fixed.deposit.request');
    Route::get('fixed-deposit/complete/index', 'FixeddepositController@fixedDepositComplete')->name('fixed.deposit.complete');
    Route::get('fixed-deposit/failed/index', 'FixeddepositController@fixedDepositFailed')->name('fixed.deposit.failed');
    Route::get('fixed-deposit/history/index', 'FixeddepositController@fixedDepositHistory')->name('fixed.deposit.history');
    Route::get('fixed-deposit/approved/{id}', 'FixeddepositController@fixedDepositApproved')->name('fixed.deposit.approved');
    Route::delete('fixed-deposit/rejected/{id}', 'FixeddepositController@fixedDepositRejected')->name('fixed.deposit.rejected');

    // Deposit Route
    Route::resource('deposit', 'DepositController');
    Route::get('deposit/complete/index', 'DepositController@depositComplete')->name('deposit.complete');
    Route::get('deposit-search', 'DepositController@depositSearch')->name('deposit.search');
    Route::get('gateway/automatic-gateway/index', 'DepositController@depositAutomaticGateway')->name('deposit.automatic.gateway');
    Route::get('gateway/automatic-gateway/{id}/edit', 'DepositController@depositAutomaticGatewayEdit')->name('deposit.automatic.gateway.edit');
    Route::put('gateway/automatic-gateway/update/{id}', 'DepositController@depositAutomaticGatewayUpdate')->name('deposit.automatic.gateway.update');
    Route::delete('gateway/automatic-gateway/delete/{id}', 'DepositController@depositAutomaticGatewayDelete')->name('deposit.automatic.gateway.delete');

    // Payment Gateway Route
    Route::get('payment-gateway/index', 'PaymentGatewayController@paymentGatewayIndex')->name('payment.gateway.index');
    Route::get('payment-gateway/create', 'PaymentGatewayController@paymentGatewayCreate')->name('payment.gateway.create');
    Route::post('payment-gateway/store', 'PaymentGatewayController@paymentGatewayStore')->name('payment.gateway.store');
    Route::get('payment-gateway/edit/{id}', 'PaymentGatewayController@paymentGatewayEdit')->name('payment.gateway.edit');
    Route::put('payment-gateway/update/{id}', 'PaymentGatewayController@paymentGatewayUpdate')->name('payment.gateway.update');

    // Currency Route
    Route::resource('currency', 'CurrencyController');
    
    // Country Route
    Route::resource('country', 'CountryController');

    // Pages Route
    Route::resource('pages', 'PageController');

    // Language Route
    Route::resource('language', 'LanguageController');
    Route::post('language/set','LanguageController@lang_set')->name('language.set');

    // Investor Route
    Route::resource('investor', 'InvestorsController');

    //How it works route
    Route::resource('website/howitworks', 'HowItWorksController');

    //services route
    Route::resource('website/services', 'ServiceController');

    //feedbacks route
    Route::resource('website/feedbacks', 'FeedbackController');

    //counter route
    Route::get('website/counter', 'CounterController@counterIndex')->name('counter.index');
    Route::put('counter/update/{id}', 'CounterController@counterUpdate')->name('counter.update');

    // Title Managment
    Route::get('title/how-it-work-title', 'TitleManagmentController@howItWorkTitle')->name('howit.work.title');
    Route::put('title/how-it-work-title/update/{id}', 'TitleManagmentController@howItWorkTitleUpdate')->name('howit.work.title.update');
    Route::get('title/services-title', 'TitleManagmentController@servicesTitle')->name('services.title');
    Route::put('title/services-title/update/{id}', 'TitleManagmentController@servicesTitleUpdate')->name('services.title.update');
    Route::get('title/top-investor-title', 'TitleManagmentController@topInvestorTitle')->name('top.investor.title');
    Route::put('title/top-investor-title/update/{id}', 'TitleManagmentController@topInvestorTitleUpdate')->name('top.investor.title.update');
    Route::get('titles', 'TitleManagmentController@title_view')->name('titles');
    Route::put('title/client-freedback-title/update', 'TitleManagmentController@title_update')->name('client.freedback.title.update'); 
    Route::get('title/latest-news-title', 'TitleManagmentController@latestNewsTitle')->name('latest.news.title');
    Route::put('title/latest-news-title/update/{id}', 'TitleManagmentController@latestNewsTitleUpdate')->name('latest.news.title.update');
    
    // Option ROute
    Route::resource('options', 'OptionController');
    Route::get('option/billcharge/edit','OptionController@billChargeEdit')->name('option.billcharge.edit');
    Route::put('option/billcharge/update/{id}','OptionController@billChargeUpdate')->name('option.billcharge.update');

    // Own bank
    Route::get('option/ownbank/edit', 'OptionController@ownbankEdit')->name('option.ownbank.edit');
    Route::put('option/ownbank/update/{id}', 'OptionController@ownbankUpdate')->name('option.ownbank.update');

    // Verification settings
    Route::get('option/verification-settings', 'OptionController@verificationSettingsEdit')->name('option.verification.edit');
    Route::put('option/verification/update/{id}', 'OptionController@verificationSettingsUpdate')->name('option.verification.update');

    // Twilio Info
    Route::get('option/twilio', 'OptionController@twilioEdit')->name('option.twilio.edit');
    Route::put('option/twilio/update/{id}', 'OptionController@twilioUpdate')->name('option.twilio.update');

    // Hero Section
    Route::get('website/hero/section', 'OptionController@heroSection')->name('option.hero.section');
    Route::put('website/hero/section/update/{id}', 'OptionController@heroSectionUpdate')->name('option.hero.section.update');

    //Support Route 
    Route::resource('support', 'SupportController');
    Route::post('supportInfo', 'SupportController@getSupportData')->name('support.info');
    Route::post('supportstatus', 'SupportController@supportStatus')->name('support.status');

    //Report Routes
    Route::get('report/users', 'ReportController@users')->name('report.users');
    Route::get('report/user-search', 'ReportController@userSearch')->name('report.users.search');
    Route::get('report/transactions', 'ReportController@transactions')->name('report.transactions');
    Route::get('report/transaction-search', 'ReportController@transactionSearch')->name('report.transaction.search');
    Route::get('theme/settings', 'OptionController@settingsEdit')->name('theme.settings');
    Route::put('theme/settings-update/{id}', 'OptionController@settingsUpdate')->name('theme.settings.update');
    
    // Phone Route
    Route::resource('phone-settings', 'PhoneController');
});


//**==================================== User Route Group ===============================================**//

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth','user','verified','verifiedphone']], function () {

    // User Dashboard Route
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('dashboard/user', 'DashboardController@user_info')->name('dashboard.user_info');
    Route::get('edeposit', 'EdepositController@index')->name('edeposit.index');
    Route::get('payment/success', 'EdepositController@payment_success');
    Route::get('payment/fail','EdepositController@payment_fail');
    Route::post('edeposit/{id}/check', 'EdepositController@check')->name('edeposit.check');
    Route::get('edeposit/payment', 'EdepositController@payment')->name('edeposit.payment');
    Route::post('edeposit/deposit', 'EdepositController@deposit')->name('edeposit.deposit');
    Route::get('edeposit/history', 'EdepositController@history')->name('edeposit.history');
    Route::get('edeposit/show/{id}', 'EdepositController@show')->name('edeposit.show');

    //Transfer Routes
    Route::get('transfer/ownbank', 'TransferController@ownbank')->name('transfer.ownbank');
    Route::post('transfer/ownbank/confirm', 'TransferController@ownbankConfirm')->name('transfer.ownbank.confirm');
    Route::post('transfer/ownbank/transfer-otp', 'TransferController@ownbankTransferOTP')->name('transfer.ownbank.transferotp');
    Route::get('transfer/ownbank/transfer-otp', 'TransferController@ownbankTransferOTPview')->name('transfer.ownbank.transferotpview');
    Route::post('transfer/ownbank/confirm-otp', 'TransferController@confirmOTP')->name('transfer.ownbank.confirmotp');

    //Other bank 
    Route::get('transfer/otherbank', 'TransferController@otherbank')->name('transfer.otherbank');
    Route::post('transfer/otherbank/countrylist', 'TransferController@getCountryList')->name('transfer.otherbank.country');
    Route::post('transfer/otherbank/confirm', 'TransferController@otherbankConfirm')->name('transfer.otherbank.confirm');
    Route::post('transfer/otherbank/transfer-otp', 'TransferController@otherbankTransferOTP')->name('transfer.otherbank.transferotp');
    Route::get('transfer/otherbank/transfer-otp', 'TransferController@otherbankTransferOTPview')->name('transfer.otherbank.transferotpview');
    Route::post('transfer/otherbank/confirm-otp', 'TransferController@OtherBankConfirmOTP')->name('transfer.otherbank.confirmotp');

    //Ecurrency
    Route::get('transfer/e-currency', 'TransferController@ecurrency')->name('transfer.ecurrency');
    Route::post('transfer/e-currency/check/{id}', 'TransferController@ecurrencyCheck')->name('transfer.ecurrency.check');
    Route::get('transfer/e-currency/confirm', 'TransferController@ecurrencyConfirm')->name('transfer.ecurrency.confirm');
    Route::post('transfer/e-currency/transfer-otp', 'TransferController@ecurrencyOTP')->name('transfer.ecurrency.transferotp');
    Route::get('transfer/e-currency/transfer-otp', 'TransferController@ecurrencyOTP')->name('transfer.ecurrency.transferotpview');
    Route::post('transfer/e-currency/confirm-otp', 'TransferController@ecurrencyConfirmOTP')->name('transfer.ecurrency.confirmotp');

    //from home page
    Route::post('transfer/e-currency/check/', 'TransferController@ecurrencyCheckHome')->name('transfer.ecurrency.checkhome');

    //Transaction History
    Route::get('transaction/history', 'TransactionController@history')->name('transaction.history');
    Route::get('transaction/pdf', 'TransactionController@transactionPDF')->name('transaction.pdf');
    Route::get('transaction/search', 'TransactionController@transcctionSearch')->name('transaction.search');
    Route::get('transaction/view/{id}', 'TransactionController@view')->name('transaction.view');

    // Fixed Deposit Package
    Route::get('fixed-deposit-package', 'DepositController@fixedDepositPackage')->name('fixed.deposit.package');
    Route::post('fixed-deposit-request/{id}', 'DepositController@fixedDepositRequest')->name('fixed.deposit.request');
    Route::get('fixed-deposit-history', 'DepositController@fixedDepositHistory')->name('fixed.deposit.history');


    // Loan Package 
    Route::get('loan-package', 'LoanController@loanPackage')->name('loan.package');
    Route::post('loan-package/store/{id}', 'LoanController@loanPackageStore')->name('loan.package.store');
    Route::get('loan-history', 'LoanController@loanHistory')->name('loan.history');
    Route::get('loan-return/{id}', 'LoanController@loanReturn')->name('return.loan');


    // User Setting 
    Route::get('account-settings', 'AccountSettingController@accountSetting')->name('account.setting');
    Route::post('account-settings/confirmation', 'AccountSettingController@accountSettingConfirmation')->name('account.setting.confirmation');
    Route::get('account-password/change', 'AccountSettingController@accountPasswordChange')->name('account.password.change');
    Route::post('account-password/update', 'AccountSettingController@accountPasswordUpdate')->name('account.password.update');
    Route::get('account-password/change/otp/view', 'AccountSettingController@accountPasswordOtpView')->name('account.password.change.otp.view');
    Route::post('account-password/otp/confirmation', 'AccountSettingController@accountPasswordOtp')->name('account.password.otp.confirmation');
    Route::post('account-password/resend/otp', 'AccountSettingController@accounOtpResend')->name('account.otp.reset');
    Route::post('account/info/update', 'AccountSettingController@accountUpdate')->name('account.update');
    Route::get('account/statement', 'AccountSettingController@accountStatement')->name('account.statement');
    Route::get('account/statements/search', 'AccountSettingController@accountStatementSearch')->name('account.statement.search');

    //bill route 
    Route::resource('bill', 'BillController');
    Route::post('bill/confirm/{id}', 'BillController@billSendOTP')->name('bill.confirm');
    Route::get('bill-requests', 'BillController@billRequests')->name('bill.request');
    Route::get('bill/otpconfirm/{id}', 'BillController@billSendOTP')->name('bill.otpconfirm');
    Route::get('bill/resend/{id}', 'BillController@billResendOTP')->name('bill.otpresend');
    Route::post('bill/payment/{id}', 'BillController@billpayment')->name('bill.payment');
    
    // Account Statments
    Route::get('account-statement', 'StatementController@accountStatement')->name('account.statement');
    Route::get('own/bank/statement', 'StatementController@OwnBankStatement')->name('own.bank.statement');
    Route::get('own/bank/statement-print', 'StatementController@ownBankStatementPDF')->name('statement.ownbankpdf');
    
    Route::get('bill-statement', 'StatementController@billStatement')->name('bill.statement');
    Route::get('bill/statement/print', 'StatementController@billStatementPDF')->name('statement.billpdf');
    Route::get('bill/statement/view/{id}', 'StatementController@billStatementView')->name('bill.statement.view');
    Route::get('own/bank/statement/view/{id}', 'StatementController@ownBankStatementView')->name('own.bank.statement.view');
    Route::get('others/bank/statement', 'StatementController@OtherBankStatement')->name('others.bank.statement');
    Route::get('others/bank/statement/view/{id}', 'StatementController@OtherBankStatementView')->name('others.bank.statement.view');
    Route::get('others/bank/statement-print', 'StatementController@otherBankStatementPDF')->name('statement.otherbankpdf');
    Route::get('edeposit/statement', 'StatementController@eDepositStatement')->name('edeposit.statement');
    Route::get('edeposit/statement-print', 'StatementController@eDepositStatementPDF')->name('statement.edepositPDF');
    
    //Support Route 
    Route::resource('support', 'SupportController');

});

//**==================================== Payment Gateway Route Group =============================================**//

Route::group(['middleware' => ['auth','user','verified','verifiedphone']], function () {

    Route::get('/payment/paypal','\App\Lib\Paypal@status');
    Route::get('/user/razorpay/payment','\App\Lib\Razorpay@view');
    Route::post('/user/razorpay/status','\App\Lib\Razorpay@status');
    Route::get('/payment/mollie','\App\Lib\Mollie@status');
    Route::get('/payment/instamojo','\App\Lib\Instamojo@status');
    Route::get('/payment/toyyibpay','\App\Lib\Toyyibpay@status');
    Route::get('/user/paystack/payment','\App\Lib\Paystack@view');
    Route::post('/payment/paystack','\App\Lib\Paystack@status');

});