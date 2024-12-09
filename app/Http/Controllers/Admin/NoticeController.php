<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search.value');
            $columns = $request->input('columns');
            $pageSize = $request->input('length');
            $order = $request->input('order')[0];
            $orderColumnIndex = $order['column'];
            $orderBy = $order['dir'];
            $start = $request->input('start');

            $notice = Notice::query();
            $totalCount = $notice->count();
            $searchNotice = $notice->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            });

            $countSearch = $searchNotice->count();
            $response = $searchNotice->orderBy($columns[$orderColumnIndex]['data'], $orderBy)
                ->offset($start)
                ->limit($pageSize);

            return DataTables::of($response)
                ->addIndexColumn()
                ->addColumn('action', function ($action) {
                    $btn = '<button class="btn btn-primary editNoticeBtn" data-id="' . $action->id . '" type="button" >Edit</button>';
                    $btn .= '<button class="btn btn-danger deleteNoticeBtn" data-id="' . $action->id . '" type="button" >Delete</button>';
                    return $btn;
                })
                ->addColumn('status', function ($status) {
                    $checked = $status->status == 'Active' ? 'checked' : '';
                    return '<div class="form-check form-switch">
                    <input class="form-check-input statusIdData d-flex mx-auto" type="checkbox" data-id="' . $status->id . '" role="switch" id="flexSwitchCheckChecked" ' . $checked . '>
                    </div>';
                })
                ->addColumn('image', function ($img) {
                    $image = $img->image ? asset('storage/' . $img->image) : '';
                    return ' <img  src="' . $image . '"  class="img-fluid"  alt="image" />';
                })
                ->addColumn('description', function ($desc) {
                    return strip_tags(Str::limit($desc->description, 50));
                })
                ->with('recordsFiltered', $countSearch)
                ->with('recordsTotal', $totalCount)
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }
        $extraJs = array_merge(
            config('js-map.admin.summernote.script'),
            config('js-map.admin.datatable.script')
        );
        $extraCs = array_merge(
            config('js-map.admin.summernote.style'),
            config('js-map.admin.datatable.style')
        );
        return view('Admin.pages.Notice.notice', ['extraJs' => $extraJs, 'extraCs' => $extraCs]);
    }


    public function toggleStatus($id)
    {
        try {
            Notice::query()->update(['status'=>'Inactive']);
            $notice = Notice::find($id);
            // dd($notice);
            if ($notice->status == 'Active') {
                $notice->status = 'Inactive';
            } else {
                $notice->status = 'Active';
            }
            $notice->save();
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoticeRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $path = 'images/notice/';
                $imageName = time() . '.' . $request->image->getClientOriginalName();
                $store = $request->image->storeAs($path, $imageName, 'public');
                $data['image'] = $store;
            }
            // $data['status']='Active';
            $notice=Notice::create($data);
            Notice::query()->update(['status'=>'Inactive']);
            DB::commit();
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Notice::find($id);
            return response()->json(['success' => true, 'message' => $data, 'status' => 200],);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(NoticeRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $notice = Notice::find($id);
            if ($request->hasFile('image')) {
                $filepath = 'images/notice/';
                if ($notice->image != null) {
                    Storage::disk('public')->delete($notice->image);
                }
                $imageName = time() . '.' . $request->image->getClientoriginalName();
                $store = $request->image->storeAs($filepath, $imageName, 'public');
                $data['image'] = $store;
            }
            $notice->update($data);
            DB::commit();
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Notice::find($id)->delete();
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
