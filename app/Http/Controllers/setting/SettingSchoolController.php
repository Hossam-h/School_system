<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\SettingSchool;
use Exception;
use Illuminate\Http\Request;

class SettingSchoolController extends Controller
{

      public function index() {

        $collection = SettingSchool::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('setting.index', $setting);


    }

    public function update(Request $request){


         try{

           $info = $request->except('_token','_method','logo');
           foreach($info as $key => $value){
               
               SettingSchool::where('key',$key)->update(['value'=>$value]);

           }

           if($request->hasFile('logo')){

            $file=$request->file('logo');
           $oldLogo=SettingSchool::where('key','logo')->select('value')->first()->value;

            if($oldLogo){
              unlink('logo/'.$oldLogo);
               $logoName= $file->getClientOriginalName();
                SettingSchool::where('key','logo')->update(['value'=>$logoName]);
                $file->move('logo/',$logoName);
            }else{

                $logoName= $file->getClientOriginalName();
                SettingSchool::where('key','logo')->update(['value'=>$logoName]);
                $file->move('logo/',$logoName);
            }



           }

           toastr()->success(trans('messages.edit'));
           return back();

         }catch(Exception $e){

         }

  }
}
