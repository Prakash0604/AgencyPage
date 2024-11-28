<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){

            $contact=Contact::all();
            
            return DataTables::of($contact)
            ->addIndexColumn()
            ->addColumn('action',function($item){
                return '<button class="btn btn-danger contactDeleteBtn" type="button" data-id="'.$item->id.'">Delete</button>';
            })
            ->addColumn('message',function($mess){
                return  '<button class="btn btn-info messageBtn" type="button" data-id="'.$mess->id.'">Message</button>';
            })
            ->rawColumns(['action','message'])
            ->make(true);
        }

        $extraJs=array_merge(
            config('js-map.admin.datatable.script')
        );

        $extraCs=array_merge(
            config('js-map.admin.datatable.style')
        );
        return view('Admin.pages.Contact.contact',compact('extraJs','extraCs'));
    }

    public function showDetail($id){
        try{
            $contact=Contact::find($id);
            return response()->json(['success'=>true,'message'=>$contact]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function destroy($id){
        try{
            Contact::find($id)->delete();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
