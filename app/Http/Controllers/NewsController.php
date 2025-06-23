<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Fetch studios from the database, ordered by newest first
        $news = News::orderBy('created_at', 'desc')->paginate(9);

        // Pass the news data to the view
        return view('news', compact('news')); // Ensure you have a 'news/index.blade.php' file in the 'resources/views' directory       
    }

    public function show($id)
    {
        // Fetch the specific news item by ID
        $newsItem = News::findOrFail($id);

        // Pass the news item to the view
        return view('newsdetail', compact('newsItem')); // Ensure you have a 'news/show.blade.php' file in the 'resources/views' directory
    }
}