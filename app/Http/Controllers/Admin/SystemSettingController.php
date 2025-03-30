<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SysemSetting\StoreSystemSettingRequest;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class SystemSettingController extends Controller
{
    public function index()
    {
    $systemSetting = systemSetting();
        return view('admin.setting.index',compact('systemSetting'));
    }


    public function store(StoreSystemSettingRequest $request)
    {
        if ($systemSetting = SystemSetting::latest()->first()) {
            if ($request->hasFile('logo1') && $logo1 = $systemSetting->getRawOriginal('logo1')) {
                $this->deleteFile($logo1);
            }
            if ($request->hasFile('logo2') && $logo2 = $systemSetting->getRawOriginal('logo2')) {
                $this->deleteFile($logo2);
            }
            $systemSetting->update($request->validated());
        } else {
            SystemSetting::create($request->validated());
        }
        Alert::success('Course updated successfully');
        Cache::forget('systemSetting');
        return back();
    }

}
