<?php

namespace App\Http\Controllers;

use App\Models\ModuleActivity;
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
            'module_id' => ['required', 'integer'],
            'event_type' => ['required', 'string', 'max:255'],
            'event_description' => ['required', 'string'],
        ]);

        $data = $request->all();

        ModuleActivity::create($data);
        return response()->json(['message' => 'Module activity created successfully.'], 201);
    }
}
