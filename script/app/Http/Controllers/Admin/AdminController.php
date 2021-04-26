<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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
        $type = $request->form_type;
        $filter = $request->filter;
        if($type == 'trans_id'){
            $transaction = Transaction::where('trxid', $filter)->with('user')->orderBy('id', 'DESC')->first();
            if(!$transaction){
                return view('admin.search.index')->withErrors('Transaction Id not found.');
            }

        }elseif($type == 'acc_no'){
            $transaction = Transaction::wherehas('user', function ($query) use ($filter){
                $query->where('account_number', $filter);
            })->with('user')->orderBy('id', 'DESC')->first();
            if(!$transaction){
                return view('admin.search.index')->withErrors('Account number not found.');
            }

        }elseif($type == 'cnic'){
            $transaction = Transaction::wherehas('user', function ($query) use ($filter){
                $query->where('cnic', $filter);
            })->with('user')->orderBy('id', 'DESC')->first();
            if(!$transaction){
                return view('admin.search.index')->withErrors('CNIC not found.');
            }

        }elseif($type == 'phone_no'){
            $transaction = Transaction::wherehas('user', function ($query) use ($filter){
                $query->where('phone', $filter);
            })->with('user')->orderBy('id', 'DESC')->first();
            if(!$transaction){
                return view('admin.search.index')->withErrors('Phone number not found.');
            }

        }elseif($type == 'email'){
            $transaction = Transaction::wherehas('user', function ($query) use ($filter){
                $query->where('email', $filter);
            })->with('user')->orderBy('id', 'DESC')->first();
            if(!$transaction){
                return view('admin.search.index')->withErrors('Email not found.');
            }

        }



        $data['transaction'] = $transaction;
        return view('admin.search.index')->with($data);

    }
}
