<?php

namespace App\Http\Controllers;

use App\Models\Advocate;
use App\Models\News;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the public home page.
     */
    public function index(): View
    {
        $advocates = Advocate::latest()->take(4)->get();
        $latestNews = News::latest()->take(3)->get();

        return view('home', compact('advocates', 'latestNews'));
    }
}
