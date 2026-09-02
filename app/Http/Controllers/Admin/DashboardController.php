<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advocate;
use App\Models\News;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard with key stats.
     */
    public function index(): View
    {
        $advocatesCount = Advocate::count();
        $newsCount = News::count();
        $recentNews = News::with('admin')->latest()->take(5)->get();
        $advocates = Advocate::latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'advocatesCount',
            'newsCount',
            'recentNews',
            'advocates'
        ));
    }
}
