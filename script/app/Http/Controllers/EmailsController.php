<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;

class EmailsController extends Controller
{
    protected $email_templates;

    public function __construct(){
        $this->email_templates = [
            'welcome' => [
                'template' => 'welcome',
                'subject' => 'Welcome to '.config('app.name'),
                'head_text' => 'We are pleased to have you.',
                'foot_text' => ''
            ],
            'email_verification' => [
                'template' => 'code',
                'subject' => 'Email verification from '.config('app.name'),
                'head_text' => 'Here is the code to verify your email.',
                'foot_text' => ''
            ],
            'reset_password' => [
                'template' => 'code',
                'subject' => 'Reset Password Code',
                'head_text' => 'Use the code below to reset your password',
                'foot_text' => ''
            ],
            'login_otp' => [
                'template' => 'code',
                'subject' => 'Login OTP',
                'head_text' => 'Your 6 digit login OTP code',
                'foot_text' => ''
            ],
            'transaction_otp' => [
                'template' => 'code',
                'subject' => 'Transaction OTP',
                'head_text' => 'Your transaction OTP code',
                'foot_text' => ''
            ]
        ];
    }

    function sendEmail($template, $email, $data){
        $template = isset($this->email_templates[$template]) ? $this->email_templates[$template] : [];
        if(isEmpty($template)){
            return ['status' => false, 'message' => 'Template is invalid'];
        }
        Mail::send('mail.'.$template['template'], ['email' => $email, 'data' => $data, 'template' => $template], function ($m) use ($email, $template) {
            $m->from(config('mail.from.address'), config('mail.from.name'));
            $m->to($email)->subject($template['subject']);
        });
        return ['status' => true, 'message' => 'Email sent successfully'];

    }



}
