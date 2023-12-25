<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Auth;
use Image; 
use Illuminate\Support\Carbon;
class SettingsController extends Controller
{
    
        public function SettingAll(){
            $setting = Settings::latest()->get();
            return view('backend.settings.index',compact('setting'));
        } 


        public function SettingAdd(){

            $setting = Settings::all();
            return view('backend.settings.setting_add',compact('setting'));
        } // End Method 
    

        public function SettingStore(Request $request){

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Settings::insert([
                'companyname' => $request->companyname,
                'address' => $request->address,
                'tin' => $request->tin,
                'vat' => $request->vat,
                'image' => $save_url,
                'owner' => $request->owner,
                'tel' => $request->tel,
                'email' => $request->email,
                'sss' => $request->sss,
                'pagibig' => $request->pagibig,
                'philhealth' => $request->philhealth,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(), 
            ]);

            $notification = array(
                'message' => 'Company Details Inserted Successfully', 
                'alert-type' => 'success'
            );
             return redirect()->route('setting.all')->with($notification); 

        }

        public function SettingEdit($id){
            $setting = Settings::all();
            $setting = Settings::findOrFail($id);

            return view('backend.settings.setting_edit',compact('setting'));
        }



    public function SettingUpdate(Request $request){

        $setting_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Settings::findOrFail($setting_id)->update([
                'companyname' => $request->companyname,
                'address' => $request->address,
                'tin' => $request->tin,
                'vat' => $request->vat,
                'image' => $save_url,
                'owner' => $request->owner,
                'tel' => $request->tel,
                'email' => $request->email,
                'sss' => $request->sss,
                'pagibig' => $request->pagibig,
                'philhealth' => $request->philhealth,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(), 
            ]);

         $notification = array(
            'message' => 'Settings Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('setting.all')->with($notification); 
             
        } else{

            Settings::findOrFail($setting_id)->update([
                'companyname' => $request->companyname,
                'address' => $request->address,
                'tin' => $request->tin,
                'vat' => $request->vat,
                'owner' => $request->owner,
                'tel' => $request->tel,
                'email' => $request->email,
                'sss' => $request->sss,
                'pagibig' => $request->pagibig,
                'philhealth' => $request->philhealth,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(), 

        ]);
         $notification = array(
            'message' => 'Setting Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('setting.all')->with($notification); 

        } // end else 

    } // End Method

    public function SettingDelete($id){

        $setting = Settings::findOrFail($id);
        $img = $setting->image;
        unlink($img);

        Settings::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Settings Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

}
