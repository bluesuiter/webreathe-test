<?php

namespace App\Http\Controllers;

use App\Models\ModuleActivity;
use App\Models\Modules;
use Illuminate\Http\Request;

class ModuleActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $activity = ModuleActivity::where('module_id', $id)->get();
        return response()->json($activity);
    }

    /**
     * Show the form for creating a new module activity.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sr_no' => ['required', 'string'],
        ]);

        $srNo = $request->get('sr_no');
        $module = Modules::where('sr_no', $srNo)->first();

        $data = $request->all();
        $data['description'] = "Module ($module->sr_no) is up.";
        $data['module_id'] = $module->id;
        $data['created_at'] = $request->get('timestamp');
        unset($data['sr_no']);
        unset($data['timestamp']);

        ModuleActivity::create($data);
        return response()->json(['message' => 'Module activity created successfully.'], 201);
    }

    /**
     * Show the form for creating a new module activity.
     */
    public function isModueleUp()
    {
        $modules = ModuleActivity::with(['modules' => function ($query) {
            $query->where('active_fl', true);
        }])->where('created_at', '<', now()->subMinitues(5))->get();

        foreach ($modules as $module) {
            $data['module_id'] = $module->id;
            $data['up_fl']  = false;
            $data['description'] = 'Module is down';
            ModuleActivity::create($data);
        }
    }
}
