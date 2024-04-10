<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait ImageHelper
{
    function deleteImage($path)
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}