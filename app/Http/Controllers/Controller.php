<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

abstract class Controller
{
    public function deleteFile($url)
    {
        if(Storage::disk('public')->exists($url)){
            Storage::disk('public')->delete($url);
        }
    }
}
