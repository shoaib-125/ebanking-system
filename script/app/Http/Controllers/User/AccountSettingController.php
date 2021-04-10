<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\PasswordChangeOtp;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountSettingController extends Controller
{

    public $verification_doc_dir = 'images/verificationDocs';

    //Verification docs submit
    function verificationRequest(Request $request){
        $request->validate([
            'idf_image' => 'required',
            'idb_image' => 'required',
            'selfie_image' => 'required',
            'bill_image' => 'required',
        ], [
            'idf_image.required' => 'ID Image(front) is required',
            'idb_image.required' => 'ID Image(back) is required',
            'selfie_image.required' => 'Selfie is required',
            'bill_image.required' => 'Utility bill is required',
        ]);

        $user = User::find(Auth::id());
        $status = 0;

        if ($request->idf_image != '' && $request->idf_image != null && $request->hasFile('idf_image')) {
            $img = $request->file('idf_image');
            $img_name = Auth::id() . 'idf_img' . '.' . $img->getClientOriginalExtension();
            $uploaded_path = public_path() . '/'. $this->verification_doc_dir;
            $img->move($uploaded_path, $img_name);

            $user->id_front = asset($this->verification_doc_dir).'/' . $img_name;
            $status++;
        }

        if ($request->idb_image != '' && $request->idb_image != null && $request->hasFile('idb_image')) {
            $img = $request->file('idb_image');
            $img_name = Auth::id() . 'idb_image' . '.' . $img->getClientOriginalExtension();
            $uploaded_path = public_path() . '/'. $this->verification_doc_dir;
            $img->move($uploaded_path, $img_name);

            $user->id_back = asset($this->verification_doc_dir).'/' . $img_name;
            $status++;
        }

        if ($request->selfie_image != '' && $request->selfie_image != null && $request->hasFile('selfie_image')) {
            $img = $request->file('selfie_image');
            $img_name = Auth::id() . 'selfie_image' . '.' . $img->getClientOriginalExtension();
            $uploaded_path = public_path() . '/'. $this->verification_doc_dir;
            $img->move($uploaded_path, $img_name);

            $user->selfie = asset($this->verification_doc_dir).'/' . $img_name;
            $status++;
        }

        if ($request->bill_image != '' && $request->bill_image != null && $request->hasFile('bill_image')) {
            $img = $request->file('bill_image');
            $img_name = Auth::id() . 'bill_image' . '.' . $img->getClientOriginalExtension();
            $uploaded_path = public_path() . '/'. $this->verification_doc_dir;
            $img->move($uploaded_path, $img_name);

            $user->bill = asset($this->verification_doc_dir).'/' . $img_name;
            $status++;
        }

        if($user->save() && $status == 4){
            return redirect()->route('user.dashboard')->with('success', 'Request submitted');
        }
        return redirect()->route('user.dashboard')->withErrors(['There is some problem. Please try again.']);

    }

    // Account Setting
    public function accountSetting()
    {
        if (Session::get('confirm') == 'user_update') {
            return view('user.accountsetting.user_update');
        } else {
            return view('user.accountsetting.password_confirmation');
        }
    }

    // Account Setting Confirmation
    public function accountSettingConfirmation(Request $request)
    {
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->password])) {
            Session::put('confirm', 'user_update');
            return redirect()->route('user.account.setting');
        } else {
            return redirect()->back()->with('error', 'Current Password Not Match');
        }

    }

    // Account Update
    public function accountUpdate(Request $request)
    {

        $request->validate([
            'name'         => 'required',
            'email'        => 'required|unique:users,email,' . Auth::user()->id,
            'phone_number' => 'required|numeric|unique:users,phone,' . Auth::user()->id,
        ]);

        // update
        $changePass                = User::find(Auth::user()->id);
        $changePass->name          = $request->name;
        $changePass->email         = $request->email;
        $changePass->phone         = '+'.$request->phone_number;
        $changePass->two_step_auth = $request->step_validation;
        $changePass->save();

        // Redirect
        return response()->json('Successfully Updated');

    }

    // Account Password Change View
    public function accountPasswordChange()
    {
        return view('user.accountsetting.password_change');
    }

    // Account Password Update
    public function accountPasswordUpdate(Request $request)
    {
        if ($request->current_password) {

            $request->validate([
                'current_password' => 'required|password',
                'password'         => 'required|confirmed',
            ]);
        }
        $user = User::findOrFail(Auth::user()->id);
        //OTP
        $data['email'] = $user->email;
        $data['type'] = 'password_change';
        $data['confirmation_code'] = rand(1000, 9999);
        Session::put('confirmation_code', $data['confirmation_code']);
        Session::put('new_pass', $request->password);
        if (env('QUEUE_MAIL') == 'on') {
            dispatch(new SendEmailJob($data));
        }else{
            Mail::to($user->email)->send(new PasswordChangeOtp($data));
        }

        
        return redirect()->route('user.account.password.change.otp.view');
    }

    // Password change otp view
    public function accountPasswordOtpView()
    {
        return view('user.userotp.password_update_otp');
    }

    // Password OTP RESEND
    public function accounOtpResend(Request $request)
    {
        $data['confirmation_code'] = rand(1000, 9999);
        Session::put('confirmation_code', $data['confirmation_code']);
        $user = User::findOrFail(Auth::user()->id);
        $data['type'] = 'password_change';
        $data['email'] = $user->email;
        if (env('QUEUE_MAIL') == 'on') {
            dispatch(new SendEmailJob($data));
        }else{
            Mail::to($user->email)->send(new PasswordChangeOtp($data));
        }
        // Mail::to($user->email)->send(new PasswordChangeOtp($data));
        
        return redirect()->route('user.account.password.change.otp.view');
    }

    // Account Password OTP Confirmation
    public function accountPasswordOtp(Request $request)
    {
        // Check
        if ($request->otp != Session::get('confirmation_code')) {
            return redirect()->back()->with('error', "OTP not matched");
        } else {
            $new_pass = Session::get('new_pass');
            $user_pass_update           = User::findOrFail(Auth::user()->id);
            $user_pass_update->password = Hash::make($new_pass);
            $user_pass_update->save();
            Session::forget('confirmation_code');
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Change Successfully');
        }
    }

    // Account Statement
    public function accountStatement()
    {
        $transactions = Transaction::where('user_id', Auth::id())->latest()->paginate(15);
        return view('user.accountsetting.account_statement', compact('transactions'));
    }

    // Account Statement Search
    public function accountStatementSearch(Request $request)
    {
        $start_date       = $request->start_date . " 00:00:00";
        $end_date         = $request->end_date . " 23:59:59";
        $search_statement = Transaction::where('user_id', Auth::id())->whereBetween('created_at', [$start_date, $end_date])->get();
        return view('user.accountsetting.search_statement', compact('search_statement', 'start_date', 'end_date'));
    }
}
