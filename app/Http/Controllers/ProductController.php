<?php

namespace App\Http\Controllers;

use App\Models\HomeProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch studios from the database, ordered by newest first
        $products = HomeProduct::orderBy('created_at', 'desc')->paginate(9);

        return view('product', compact('products')); // Ensure you have a 'contact.blade.php' file in the 'resources/views' directory
    }

    public function show($id)
    {
        // Fetch the specific product by ID
        $productItem = HomeProduct::findOrFail($id);

        // Pass the product
        return view('productdetail', compact('productItem')); // Ensure you have a 'product/show.blade.php' file in the 'resources/views' directory
    }
}