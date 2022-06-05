<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function savedata(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'website_name' => 'required|max:255',
            'website_logo' => 'required',
            'website_favicon' => 'nullable',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $setting = Setting::where('id','1')->first();
        if($setting)
        {
            $setting = new Setting;
            $setting->website_name = $request->website_name;

            if($request->hasfile('website_logo'))
            {
                $destination = 'uploads/category/' .$setting->logo; 
                if(File::exists($destination))
                {
                    File::delete($destination);
                }

                $file = $request->file('website_logo');
                $filename = time() . '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->logo = $filename; 
            }

            if($request->hasfile('website_favicon'))
            {
                $destination = 'uploads/category/' .$setting->favicon; 
                if(File::exists($destination))
                {
                    File::delete($destination);
                }

                $file = $request->file('website_favicon');
                $filename = time() . '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->favicon = $filename; 
            }
            $setting->save();
            return redirect('admin/settings')->with('message','Setting Updated');
        }
        else{
            $setting = new Setting;
            $setting->website_name = $request->website_name;

            if($request->hasfile('website_logo'))
            {
                $file = $request->file('website_logo');
                $filename = time() . '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->logo = $filename; 
            }

            if($request->hasfile('website_favicon'))
            {
                $file = $request->file('website_favicon');
                $filename = time() . '.' .$file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->favicon = $filename; 
            }
            $setting->save();
            return redirect('admin/settings')->with('message','Setting Added');

        }
    }
}
