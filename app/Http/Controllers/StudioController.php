<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        // Fetch studios from the database, ordered by newest first
        $studios = Studio::orderBy('created_at', 'desc')->paginate(9);

        return view('studio', compact('studios')); // Ensure you have a 'contact.blade.php' file in the 'resources/views' directory
    }

    public function show($id)
    {
        // Fetch the specific studio by ID
        $studioItem = Studio::findOrFail($id);

        // Pass the studio
        return view('studiodetail', compact('studioItem')); // Ensure you have a 'studio/show.blade.php' file in the 'resources/views' directory
    }
}
