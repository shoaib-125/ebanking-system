<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // User Dashboard
    public function index()
    {
        if(Auth::user()->is_verified){
            return view('user.dashboard');
        }

        $data['is_requested'] = true;
        if(Auth::user()->id_front == null || Auth::user()->id_back == null || Auth::user()->selfie == null || Auth::user()->bill == null)
            $data['is_requested'] = false;
        return view('user.verify_docs')->with($data);
    }

    public function user_info(){
        $user_total_amount = Auth::user()->balance;
        
        $ownbank_credit    = Transaction::where('user_id', Auth::user()->id)->where('type', 'ownbank_transfer_credit')->sum('amount');

        $ownbank_debit     = Transaction::where('user_id', Auth::user()->id)->where('type', 'ownbank_transfer_debit')->sum('amount');
        $total_deposit     = Deposit::where('user_id', Auth::user()->id)->where('status', 1)->sum('amount') + $ownbank_credit;
      // $ownbank_debit     = Transaction::where('user_id', Auth::user()->id)->where('type', 'ownbank_transfer_debit')->sum('amount');


        $debit0 = Transaction::where('user_id', Auth::user()->id)->where('status', 1)->where('type','otherbank_transfer')->sum('amount');
        $debit1 = Transaction::where('user_id', Auth::user()->id)->where('status', 1)->where('type','ownbank_transfer_debit')->sum('amount');
        $debit=$debit0+$debit1;

        //$total_withdraw    = Withdraw::where('user_id', Auth::user()->id)->where('status', 1)->sum('amount_usd') + $debit;
        $total_withdraw = Transaction::where('user_id', Auth::user()->id)->where('status', 1)->where('type','withdraw')->sum('amount');
        

        $transactions      = Transaction::where('user_id', Auth::user()->id)->latest()->take(10)->get();

        $data = [
            'amount' => $user_total_amount,
            'total_deposit' => $total_deposit,
            'total_withdraw' => $total_withdraw,
            'transactions' => $transactions
        ];
        
        return json_encode($data);
    }
}
