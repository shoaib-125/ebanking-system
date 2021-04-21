<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Getway;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WithdrawController extends Controller
{
    public function withdrawView(Request $request){
        $transactions = Transaction::where('user_id', Auth::id())->where('type', 'withdraw')->latest()->paginate(10);
        return view('user.withdraw.history', compact('transactions'))->with('i', 1);
    }


    public function check(Request $request){
        if(!$request->has('amount') || $request->amount == null){
            $err = 'Withdrawal amount is required';
            $error['errors']['err']=$err;
            return response()->json($error,401);
        }
        if ($request->amount <= 0 ){
            $err = 'Withdrawal amount must be greater than 0';
            $error['errors']['err']=$err;
            return response()->json($error,401);
        }
        if ($request->amount > Auth::user()->balance){
            $err = 'Withdrawal amount must be less or equal to your balance.';
            $error['errors']['err']=$err;
            return response()->json($error,401);
        }

        session([
            'withdrawal_info' => [
                'amount' => $request->amount,
                'charge' => 0,
                'status' => 2,
            ],'redirect_url' => route('user.withdraw.request.success')
        ]);

        return response()->json('Successful!');
    }

    public function withdrawRequest(){
        if(!Session::has('withdrawal_info')){
            return abort(404);
        }

        $withdrawal_info = Session::get('withdrawal_info');
        $user = User::findOrFail(Auth::id());
        $new_balance = $user->balance = $user->balance + (float)$withdrawal_info['amount'];

        // Insert transaction data into transaction table
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->trxid = mt_rand(1,10000000).mt_rand(1,10000000);
        $transaction->amount = $withdrawal_info['amount'];
        $transaction->balance = $new_balance;
        $transaction->fee =  $withdrawal_info['charge'];
        $transaction->status = $withdrawal_info['status'];
        $transaction->info = 'Withdraw request';
        $transaction->type = 'withdraw';
        $transaction->save();

        Session::forget('payment_info');
        Session::flash('message', 'Withdrawal request will be approved by admin after verification.');
        return redirect()->route('user.withdraw.history');
    }


}
