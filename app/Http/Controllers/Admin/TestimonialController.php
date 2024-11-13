<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonalRequest;
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
