<?php

use App\Models\District;
use App\Models\Gallery;
use App\Models\LocalBody;
use App\Models\Programme;
use App\Models\Province;
use App\Models\Student;
use App\Models\SystemSetting;
use App\Models\Teacher;
use Illuminate\Support\Facades\Cache;



if (!function_exists('systemSetting')) {
    function systemSetting()
    {
        return Cache::rememberForever('systemSetting', function () {
            return SystemSetting::latest()->first();
        });
    }
}
if (!function_exists('student')) {
    function student()
    {
        return Cache::rememberForever('student', function () {
            return auth()->guard('student')->user();
        });
    }
}

if (!function_exists('provinces')) {
    function provinces()
    {
        return Province::all();
    }
}
if (!function_exists('districts')) {
    function districts()
    {
        return District::all();
    }
}
if (!function_exists('localBodies')) {
    function localBodies()
    {
        return LocalBody::all();
    }
}

