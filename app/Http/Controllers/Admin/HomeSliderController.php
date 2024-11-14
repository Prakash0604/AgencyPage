<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeSliderRequest;
use Illuminate\Support\Facades\Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;

class HomeSliderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HomeSlide::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return view('Admin.Button.button', compact('data'));
                })
                ->addColumn('image', function ($item) {
                    if ($item->image != null) {
                        $url = asset('storage/' . $item->image); // Get image URL
                        return ' <td class="py-1"><img src="' . $url . '" width="50" height="50"/></td>';
                    } else {
                        $url = asset('defaultImage/defaultimage.webp');
                        return ' <td class="py-1"><img src="' . $url . '" width="50" height="50"/></td>';
                    }
                })
                ->addColumn('description',function($desc){
                    return Str::limit($desc->description,70);
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('Admin.pages.HomeSlide.homeslide');
    }


    public function store(HomeSliderRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->only('title');
            $data['shortdesc'] = strip_tags($request->shortdesc);
            if ($request->hasFile('image')) {
                $folder = 'images/homeslide/';
                $imagename = time() . '.' . $request->image->extension();
                $path = $request->image->storeAs($folder, $imagename, 'public');
                $data['image'] = $path;
            }
            HomeSlide::create($data);
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getHomeSliderDetail($id)
    {
        try {
            $data = HomeSlide::find($id);
            return response()->json(['success' => true, 'message' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update(HomeSliderRequest $request, $id)
    {
        try {
            $homeslide = HomeSlide::find($id);
            $data = $request->only(['title', 'status']);
            // $data['status']=$request->status;
            $data['shortdesc'] = strip_tags($request->shortdesc);

            if ($request->hasFile('image')) {
                $path = '/images/homeslide/';
                if ($homeslide->image != null) {
                    Storage::disk('public')->delete($homeslide->image);
                }
                $imagename = time() . '.' . $request->image->extension();
                $path = $request->image->storeAs($path, $imagename, 'public');
                $data['image'] = $path;
            }
            $homeslide->update($data);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function destory($id)
    {
        try {
            HomeSlide::find($id)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
