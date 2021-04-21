<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // Relation To User
    public function causedBy()
    {
        return $this->belongsTo(User::class, 'causer', 'id');
    }

    public function causedOnTO()
    {
        return $this->belongsTo(Deposit::class,'causedOn','id');
    }

}
