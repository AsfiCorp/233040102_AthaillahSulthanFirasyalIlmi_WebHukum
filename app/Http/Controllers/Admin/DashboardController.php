<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advocate;
use App\Models\News;
use Barryvdh\DomPDF\Facade\Pdf;
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

    /**
     * Generate and download PDF report of the dashboard.
     */
    public function report()
    {
        $advocatesCount = Advocate::count();
        $newsCount = News::count();
        $recentNews = News::with('admin')->latest()->take(5)->get();
        $advocates = Advocate::latest()->take(6)->get();

        $pdf = Pdf::loadView('admin.dashboard-report', compact(
            'advocatesCount',
            'newsCount',
            'recentNews',
            'advocates'
        ));

        // Set paper size to A4 portrait
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('dmahesa-admin-dashboard-report-'.now()->format('Y-m-d').'.pdf');
    }
}
