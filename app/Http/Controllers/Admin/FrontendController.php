<?php

namespace App\Http\Controllers\Admin;

use App\Models\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendRequest;
use App\Models\SiteData;

class FrontendController extends Controller
{
    public function index(){
        $frontend=frontend::firstOrFail();
        return view('Admin.pages.FrontEnd.frontend',compact('frontend'));
    }


    public function update(FrontendRequest $request){
        try{
            // dd($request->all());
            $id=$request->input('frontend_id');
            $frontend=frontend::findOrFail($id);
            $frontend->about_us_title=$request->input('about_us_title');
            $frontend->about_us_description=$request->input('about_us_description');
            $frontend->about_us_value=$request->input('about_us_value');
            $frontend->about_us_value_description=$request->input('about_us_value_description');
            $frontend->contact_us_email=$request->input('contact_us_email');
            $frontend->contact_us_address=$request->input('contact_us_address');
            $frontend->contact_us_number=$request->input('contact_us_number');
            $frontend->save();
            return redirect()->back()->with(['message'=>'Data Updated Successfully']);

        }catch(\Exception $e){
            Log::error('message :'.$e->getMessage());

            // return response()->json(['success'=>false,'message'=>$e->getMessage()]);
            return redirect()->back()->with(['error'=>'Something went wrong!'.$e->getMessage()]);
        }
    }


    public function siteData(){
        $siteData=SiteData::firstOrFail();
        $days=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        return view('Admin.pages.FrontEnd.sitedata',compact('days','siteData'));
    }
}
