<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisionMission;

class VisionMissionController extends Controller
{

    public function dashboardIndex()
{
    $visions = VisionMission::all();
    return view('vision.index', compact('visions'));
}



public function create()
{
    return view('vision.create');
}

public function edit($id)
{
    $vision = VisionMission::findOrFail($id);
    return view('vision.edit', compact('vision'));
}

    public function index()
    {
        $visions = VisionMission::all();
        return view('visimisi', compact('visions'));
    }

    public function store(Request $request)
    {
        VisionMission::create($request->all());
        return redirect()->route('dashboard.vision')->with('success', 'Vision & Mission added successfully!');
    }

    public function update(Request $request, $id)
    {
        $vision = VisionMission::findOrFail($id);
        $vision->update($request->all());
        return redirect()->route('dashboard.vision')->with('success', 'Vision & Mission updated successfully!');
    }

    public function destroy($id)
    {
        VisionMission::destroy($id);
        return redirect()->back()->with('success', 'Vision & Mission deleted successfully!');
    }
}
