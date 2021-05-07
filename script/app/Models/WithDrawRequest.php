<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithDrawRequest extends Model
{
    use HasFactory;


    protected $fillable = [
        'account_title',
        'account_no',
        'withdraw_method',
    ];


    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
