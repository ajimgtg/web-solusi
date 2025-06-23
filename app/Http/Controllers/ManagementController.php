<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;
use Illuminate\Support\Facades\Storage;

class ManagementController extends Controller
{

    public function index()
    {
        // get data from Management but filtered by group
        $strukturs = Management::where('group', 'struktur')->get();
        $asesors = Management::where('group', 'asesor')->get();

        return view('manajemen', compact('strukturs', 'asesors')); // Front-end
    }

    public function dashboardIndex()
    {
        $managements = Management::all();
        return view('management.index', compact('managements')); // Dashboard
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
            $validated['image'] = $request->file('image')->store('management', 'public');
        }

        Management::create($validated);

        return redirect()->route('dashboard.management')->with('success', 'Manajemen berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $manager = Management::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'nip' => 'required|string|max:50',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($manager->image) {
                Storage::disk('public')->delete($manager->image);
            }
            $validated['image'] = $request->file('image')->store('management', 'public');
        }

        $manager->update($validated);

        return redirect()->route('dashboard.management')->with('success', 'Data manajemen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $manager = Management::findOrFail($id);

        if ($manager->image) {
            Storage::disk('public')->delete($manager->image);
        }

        $manager->delete();

        return redirect()->back()->with('success', 'Manajemen berhasil dihapus!');
    }
}
