<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait ActivityLog
{
    public function logActivity($logName,$causedOn)
    {
        $activityLog = new \App\Models\ActivityLog();
        $activityLog->log_name = $logName;
        $activityLog->causer_id = \Auth::user();
        $activityLog->causedOn_id = $causedOn;
        $activityLog->save();
       dd($activityLog);
    }
}