<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    protected $email_templates;

    public function __construct(){
        $this->email_templates = [
            'welcome' => [
                'template' => 'welcome',
                'subject' => 'Welcome to '.config('app.name'),
            ],
            'email_verification' => ['template' => ''],
            'forget_password' => ['template' => ''],
            'login_otp' => ['template' => ''],
            'transaction_otp' => ['template' => '']
        ];
    }
}
