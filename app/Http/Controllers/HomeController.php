<?php

namespace App\Http\Controllers;

use App\Models\ModuleActivity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $moduleActivity = ModuleActivity::latest()->take(50)->get();

        $chartData = [];
        foreach ($moduleActivity as $activity) {
            if (!empty($chartData[$activity->modules->id]['data'])) {
                if (count($chartData[$activity->modules->id]['data']) === 7) {
                    continue;
                }
            }

            if (empty($chartData[$activity->modules->id])) {
                $chartData[$activity->modules->id] = [
                    'name' => $activity->modules->name,
                    'data' => [$activity->temprature]
                ];
            } else {
                $chartData[$activity->modules->id]['data'][] = $activity->temprature;
            }
        }

        $chartData = json_encode($chartData);
        return view('home', compact('chartData', 'moduleActivity'));
    }
}
