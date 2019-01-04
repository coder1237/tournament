<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsFormRequest;
use App\Setting;

class SettingController extends Controller
{

    public function show()
    {
        try{
            $setting = Setting::firstOrFail();
            return view('settings.form',['settings'=>$setting]);
        }
        catch (\Throwable $e){
            session()->flash('error',$e->getMessage());
        }
        return redirect()->route('groups.index');

    }

    public function update(SettingsFormRequest $request)
    {
        try{
            $setting = Setting::firstOrFail();
            $inputs = $request->only('number_of_matches','group_size');
            $setting->update($inputs);
            session()->flash('success','Settings updated successfully!');
        }
        catch (\Throwable $e){
            session()->flash('error',$e->getMessage());
        }
        return redirect()->route('settings.index');
    }
}
