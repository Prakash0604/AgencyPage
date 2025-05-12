<?php

namespace App\Http\Controllers\Admin;

use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AchievementRequest;

class AchevementController extends Controller
{
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

            $achievement = Achievement::query();
            $totalCount = $achievement->count();
            $searchAchievement = $achievement->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('number', 'LIKE', "%$search%");
            });

            $countSearch = $searchAchievement->count();
            $response = $searchAchievement->orderBy($columns[$orderColumnIndex]['data'], $orderBy)
                ->offset($start)
                ->limit($pageSize);

            return DataTables::of($response)
                ->addIndexColumn()
                ->addColumn('action', function ($action) {
                    $btn = '<button class="btn btn-primary editAchievementBtn mr-4" data-id="' . $action->id . '" type="button" >Edit</button>';

                    $btn .= '&nbsp;<button class="btn btn-danger deleteAchievementBtn" data-id="' . $action->id . '" type="button" >Delete</button>';
                    return $btn;
                })
                ->addColumn('status', function ($status) {
                    $checked = $status->status == 'Active' ? 'checked' : '';
                    return '<div class="form-check form-switch">
                    <input class="form-check-input statusIdData d-flex mx-auto" type="checkbox" data-id="' . $status->id . '" role="switch" id="flexSwitchCheckChecked" ' . $checked . '>
                    </div>';
                })
                ->addColumn('image', function ($img) {
                    $image = $img->icon ? asset('storage/' . $img->icon) : '';
                    return ' <img  src="' . $image . '"  class="img-fluid"  alt="image" />';
                })
                ->with('recordsFiltered', $countSearch)
                ->with('recordsTotal', $totalCount)
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }
        $extraJs = array_merge(
            config('js-map.admin.datatable.script')
        );
        $extraCs = array_merge(
            config('js-map.admin.datatable.style')
        );
        return view('Admin.pages.Achievement.achievement', ['extraJs' => $extraJs, 'extraCs' => $extraCs]);
    }


    public function toggleStatus($id)
    {
        try {
            $data = Achievement::find($id);
            if ($data->status == 'Active') {
                $data->status = 'Inactive';
            } else {
                $data->status = 'Active';
            }
            $data->save();
            return response()->json(['success' => true, 'message' => 'Status Changes'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AchievementRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('icon')) {
                $path = 'images/achievement/';
                $imageName = time() . '.' . $request->icon->getClientOriginalName();
                $store = $request->icon->storeAs($path, $imageName, 'public');
                $data['icon'] = $store;
            }
            Achievement::create($data);
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Achievement::find($id);
            return response()->json(['success' => true, 'message' => $data, 'status' => 200],);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AchievementRequest $request, string $id)
    {
        try {
            $data = $request->validated();
            $achievement = Achievement::find($id);
            if ($request->hasFile('icon')) {
                $filepath = 'images/achievement/';
                if ($achievement->icon != null) {
                    Storage::disk('public')->delete($achievement->icon);
                }
                $imageName = time() . '.' . $request->icon->getClientoriginalName();
                $store = $request->icon->storeAs($filepath, $imageName, 'public');
                $data['icon'] = $store;
            }
            $achievement->update($data);
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $achievement = Achievement::find($id);
            if ($achievement->icon != null) {
                Storage::disk('public')->delete($achievement->icon);
            }
            $achievement->delete();
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
