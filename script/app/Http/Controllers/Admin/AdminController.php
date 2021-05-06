<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Getway;
use App\Models\Transaction;
use App\Models\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->user()->can('admin.list')) {
            $users = User::where('role_id',1)->where('id','!=',1)->latest()->get();
            return view('admin.admin.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth()->user()->can('admin.create')) {
            $roles  = Role::all();
            return view('admin.admin.create', compact('roles'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'cnic' => 'required|min:13|max:15',
            'roles' => 'required',
            'email' => 'required|max:100|email|unique:users',
            'phone' => 'required|max:20|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create New User
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cnic = $request->cnic;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }


        return response()->json(['User has been created !!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth()->user()->can('admin.edit')) {
            $user = User::find($id);
            $roles  = Role::all();
            return view('admin.admin.edit', compact('user', 'roles'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Create New User
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'phone' => 'required|max:20|unique:users,phone,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }


        return response()->json(['User has been updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if (Auth()->user()->can('admin.delete')) {
            
                if ($request->status == 'delete') {
                    if ($request->ids) {
                        foreach ($request->ids as $id) {
                            User::destroy($id);
                        }
                    }
                }
                else{
                   
                    if ($request->ids) {
                        foreach ($request->ids as $id) {
                            $post = User::find($id);
                            $post->status = $request->status;
                            $post->save();
                        }
                    }
                }
            
        }

        return response()->json('Success');
    }

    function search(Request $request){
        if(!$request->has('form_type')){
            return view('admin.search.index')->withErrors('There is some problem.');
        }
        $transaction = null;
        $user = null;
        $type = $request->form_type;
        $filter = $request->filter;
        if($type == 'trans_id'){
            $user = User::whereHas('transaction', function($q) use($filter){
                $q->where('trxid', $filter);
            })->first();
            if($user){
                $transaction = Transaction::where('trxid', $filter)->first();
            }else{
                return view('admin.search.index')->withErrors('Transaction Id not found.');
            }

        }elseif($type == 'acc_no'){
            $user = User::where('account_number', $filter)->first();
            if(!$user){
                return view('admin.search.index')->withErrors('Account number not found.');
            }

        }elseif($type == 'cnic'){
            $user = User::where('cnic', $filter)->first();
            if(!$user){
                return view('admin.search.index')->withErrors('CNIC not found.');
            }

        }elseif($type == 'phone_no'){
            $user = User::where('phone', $filter)->first();
            if(!$user){
                return view('admin.search.index')->withErrors('Phone number not found.');
            }

        }elseif($type == 'email'){
            $user = User::where('email', $filter)->first();
            if(!$user){
                return view('admin.search.index')->withErrors('Email not found.');
            }

        }
        if($user && $transaction == null){
            $transaction = $user->transaction;
        }
        $acc_from = null;
        $acc_to = null;
        if($transaction) {
            if ($transaction->type == 'edeposit') {
                $acc_from = $transaction->deposit->account_number;
                $acc_to = $user->account_number;
            } elseif ($transaction->type == 'withdraw') {
                $acc_from = $user->account_number;
                $acc_to = $transaction->withDrawRequest->account_no;
            } elseif (str_contains($transaction->type, 'ownbank_transfer')) {
                $param = explode('$:$', $transaction->own_bank_transfer_info);
                $acc_from = $param[0];
                $acc_to = $param[1];
            }
        }
        $data['user'] = $user;
        $data['transaction'] = $transaction;
        $data['acc_from'] = $acc_from;
        $data['acc_to'] = $acc_to;

        return view('admin.search.index')->with($data);

    }

    function exportSearch(Request $request, $user_id, $trans_id){
        $user = User::find($user_id);
        $transaction = Transaction::find($trans_id);
        if(!$transaction && !$user){
            return view('admin.search.index')->withErrors('Record not found');
        }

        $columns = array('Transaction ID', 'Account number', 'CNIC', 'Mobile number', 'Email', 'Transaction Type', 'Date', 'Amount', 'Fee', 'From Account', 'To Account', 'Summary', 'Status' );
        $status = '-';
        if($transaction) {
            if ($transaction->status == 0)
                $status = 'Rejected';
            elseif ($transaction->status == 1)
                $status = 'Approved';
            elseif ($transaction->status == 2)
                $status = 'Pending';
        }
        $data[0] = array(
            $transaction ? $transaction->trxid : '-',
            $user ? $user->account_number : '-',
            $user ? $user->cnic : '-',
            $user ? $user->phone : '-',
            $user ? $user->email : '-',
            $transaction ? $transaction->type : '-',
            $transaction ? $transaction->created_at->format('Y-m-d H:i:s') : '-',
            $transaction ? $transaction->amount : '-',
            $transaction ? $transaction->fee : '-',
            '-',
            '-',
            $transaction ? $transaction->info : '-',
            $status);

        $type = $request->form_type;
        if($type == 'csv_export'){
            $fileName = 'search_result'.DateTime::dateTime()->format('Y-m-d-H-i-s').'.csv';
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $callback = function() use($transaction, $columns, $data) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($data as $row){
                    fputcsv($file, $row);

                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        }elseif($type == 'pdf_export') {
            $pdf = PDF::loadView('admin.search.pdf', compact('data', 'columns'));
            return $pdf->download('search_result'.DateTime::dateTime()->format('Y-m-d-H-i-s').'.pdf');
        }

        return redirect()->back();

    }
}
