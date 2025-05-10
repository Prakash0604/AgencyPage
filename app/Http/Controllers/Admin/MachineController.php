<?php

namespace App\Http\Controllers\Admin;

use App\Models\Machine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MachineRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MachineController extends Controller
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

            $machine = Machine::query();
            $totalCount = $machine->count();
            $searchMachine = $machine->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            });

            $countSearch = $searchMachine->count();
            $response = $searchMachine->orderBy($columns[$orderColumnIndex]['data'], $orderBy)
                ->offset($start)
                ->limit($pageSize);

            return DataTables::of($response)
                ->addIndexColumn()
                ->addColumn('action', function ($action) {
                    $btn = '<button class="btn btn-primary editMachineBtn mr-4" data-id="' . $action->id . '" type="button" >Edit</button>';
                    $btn .= '<button class="btn btn-danger deleteMachineBtn" data-id="' . $action->id . '" type="button" >Delete</button>';
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
        return view('Admin.pages.Machine.machine', ['extraJs' => $extraJs, 'extraCs' => $extraCs]);
    }


    public function toggleStatus($id)
    {
        try {
            $data = Machine::find($id);
            if ($data->status == 'Active') {
                $data->status = 'Inactive';
            } else {
                $data->status = 'Active';
            }
            $data->save();
            return response()->json(['status' => true, 'message' => 'Status Changes'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MachineRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $path = 'images/machine/';
                $imageName = time() . '.' . $request->image->getClientOriginalName();
                $store = $request->image->storeAs($path, $imageName, 'public');
                $data['image'] = $store;
            }
            $notice = Machine::create($data);
            // Notice::query()->update(['status'=>'Inactive']);
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
            $data = Machine::find($id);
            return response()->json(['success' => true, 'message' => $data, 'status' => 200],);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(MachineRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $notice = Machine::find($id);
            if ($request->hasFile('image')) {
                $filepath = 'images/machine/';
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
            $machine = Machine::find($id);
            if ($machine->image != null) {
                Storage::disk('public')->delete($machine->image);
            }
            $machine->delete();
            return response()->json(['success' => true, 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
