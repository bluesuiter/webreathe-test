<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Modules;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Modules::where('active_fl', true)->get();
        return view('modules/index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mtbf' => ['required', 'numeric', 'min:0'],
            'min_operating_temp' => ['required', 'numeric'],
            'max_operating_temp' => ['required', 'numeric', 'min:0'],
            'installed_fl' => ['boolean'],
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::user()->id;

        Modules::create($data);
        return redirect()->route('modules.index')->with('success', 'Module created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $module = Modules::find($id);
        return view('modules/show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $module = Modules::where([['id', '=', $id], ['active_fl', '=', true]])->first();
        return view('modules/edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mtbf' => ['required', 'numeric', 'min:0'],
            'min_operating_temp' => ['required', 'numeric'],
            'max_operating_temp' => ['required', 'numeric', 'min:0'],
            'installed_fl' => ['boolean'],
        ]);

        $module = Modules::find($id);
        $data = $request->all();

        $data['created_by'] = Auth::user()->id;
        $module->update($data);
        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
