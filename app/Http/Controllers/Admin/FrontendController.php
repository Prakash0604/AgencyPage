<?php

namespace App\Http\Controllers\Admin;

use App\Models\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendRequest;

class FrontendController extends Controller
{
    public function index(){
        $frontend=frontend::firstOrFail();
        return view('Admin.pages.FrontEnd.frontend',compact('frontend'));
    }


    public function update(FrontendRequest $request){
        try{
            $id=$request->frontend_id;
            frontend::findOrFail($id)->updateOrCreate($request->all());
            return redirect()->back()->with(['message'=>'Data Updated Successfully']);

        }catch(\Exception $e){
            Log::error('message :'.$e->getMessage());

            // return response()->json(['success'=>false,'message'=>$e->getMessage()]);
            return redirect()->back()->with(['error'=>'Something went wrong!']);
        }
    }
}
