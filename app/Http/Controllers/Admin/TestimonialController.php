<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonalRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data=Testimonial::orderBy('id','desc')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($data){
                return view('Admin.Button.button',compact('data'));
            })
            ->addColumn('image',function($item){
                $dataimage=asset('storage/'.$item->image);
                return ' <td class="py-1"><img src="' . $dataimage . '" width="50" height="50"/></td>';
            })
            ->addColumn('description',function($item){
                return Str::limit($item->description,20);
            })
            ->rawColumns(['action','image'])
            ->make(true);
        }
        return view('Admin.pages.TestiMonial.testimonial');
    }

    public function store(TestimonalRequest $request){
        DB::beginTransaction();
        try{
            $data=$request->only(['name','designation','address']);
            $data['description']=strip_tags($request->description);
            if($request->hasFile('image')){
                $path='/images/testimonial/';
                $imagename=time().'.'.$request->image->extension();
                $path=$request->image->storeAs($path,$imagename,'public');
                $data['image']=$path;
            }
            Testimonial::create($data);
            DB::commit();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function showDetail($id){
        try{
            $data=Testimonial::find($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }


    public function update(TestimonalRequest $request,$id){
        DB::beginTransaction();
        try{
            $testimonial=Testimonial::find($id);
            $testimonial->name=$request->input('name');
            $testimonial->designation=$request->input('designation');
            $testimonial->description=strip_tags($request->input('description'));
            $testimonial->status=$request->input('status');
            if($request->hasFile('image')){
                $filepath='/images/testimonial/';
                if($testimonial->image!== null){
                    Storage::disk('public')->delete($testimonial->image);
                }
                $imagename=time().'.'.$request->image->extension();
                $path=$request->image->storeAs($filepath,$imagename,'public');
                $testimonial->image=$path;
            }
            $testimonial->save();
            DB::commit();
            return response()->json(['success'=>true]);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function destory($id)
    {
        try{
            Testimonial::find($id)->delete();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
