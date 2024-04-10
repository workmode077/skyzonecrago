<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


trait LogError
{
    function logError($exception)
    {
        // $user = Auth::guard('admin')->user();
        // $user_id = $user ? $user->id : null;
        // $user_email = $user ? $user->email : null;

        Log::error('Error occurred: ' . $exception->getMessage());
    }
}