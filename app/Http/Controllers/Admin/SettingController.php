<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        // $setting=Setting::all();
        // dd($setting);
        $extraJs=array_merge(
            config('js-map.admin.select2.script'),
            config('js-map.admin.summernote.script')
        );

        $extraCs=array_merge(
            config('js-map.admin.select2.style'),
            config('js-map.admin.summernote.style')
        );
        return view('Admin.pages.Setting.setting', compact('setting','extraJs','extraCs'));
    }

    public function store(SettingRequest $request)
    {
        try {

            $setting = Setting::first();
            if ($request->hasFile('logo')) {
                $folder = 'images/logo/';
                if ($setting && $setting->logo != null) {
                    Storage::disk('public')->delete($setting->logo);
                }
                $imagename = time() . '.' . $request->logo->getClientOriginalName();
                $imagepath = $request->logo->storeAs($folder, $imagename, 'public');
                $data['logo'] = $imagepath;
            }

            $data = $request->validated();

            if (isset($data['logo'])) {
                $data['logo'] = $imagepath;
            }
            // dd($data);
            $setting->update($data);
            return back()->with(['success' => 'Setting Updated Successfully']);
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
