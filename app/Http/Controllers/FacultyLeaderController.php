<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacultyLeader;
use Illuminate\Support\Facades\Storage;

class FacultyLeaderController extends Controller
{
    public function index()
    {
        $leaders = FacultyLeader::all();
        return view('pimpinan', compact('leaders')); // untuk front-end
    }

    public function dashboardIndex()
    {
        $leaders = FacultyLeader::all();
        return view('leaders.index', compact('leaders')); // untuk dashboard
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'nip' => 'required|string|max:50',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('faculty_leaders', 'public');
        }

        FacultyLeader::create($validated);

        return redirect()->route('dashboard.leaders')->with('success', 'Faculty Leader added successfully!');
    }

    public function update(Request $request, $id)
    {
        $leader = FacultyLeader::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'nip' => 'required|string|max:50',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama kalau ada
            if ($leader->image) {
                Storage::disk('public')->delete($leader->image);
            }
            $validated['image'] = $request->file('image')->store('faculty_leaders', 'public');
        }

        $leader->update($validated);

        return redirect()->route('dashboard.leaders')->with('success', 'Faculty Leader updated successfully!');
    }

    public function destroy($id)
    {
        $leader = FacultyLeader::findOrFail($id);

        // Hapus gambar dari storage
        if ($leader->image) {
            Storage::disk('public')->delete($leader->image);
        }

        $leader->delete();

        return redirect()->back()->with('success', 'Faculty Leader deleted successfully!');
    }
}