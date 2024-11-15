<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data=Category::orderBy('id','desc')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($data){
                return view('Admin.Button.button',compact('data'));
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('Admin.pages.Category.category');
    }


    public function store(CategoryRequest $request){
        DB::beginTransaction();
        try{
            Category::create($request->validated());
            DB::commit();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }


    public function detailCategory($id){
        try{
            $data=Category::find($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }


    public function update(CategoryRequest $request,$id){
        DB::beginTransaction();
        try{
            Category::find($id)->update($request->validated());
            DB::commit();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function destroy($id){
        try{
            Category::find($id)->delete();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
