<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait ActivityLog
{
    public function logActivity($logName,$causedOn)
    {
        $activityLog = new \App\Models\ActivityLog();
        $activityLog->log_name = $logName;
        $activityLog->causer = \Auth::user()->id;
        $activityLog->causedOn = $causedOn->id;
        $activityLog->save();
    }
}