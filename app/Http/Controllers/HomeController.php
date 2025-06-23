<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\SliderBeranda;
use App\Models\BerandaLayananKami;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();

        $sliders = SliderBeranda::all();

        $layanans = BerandaLayananKami::all();

        $faqs = Faq::all();

        return view('index', compact('aboutUs', 'sliders', 'layanans', 'faqs'));
    }
}