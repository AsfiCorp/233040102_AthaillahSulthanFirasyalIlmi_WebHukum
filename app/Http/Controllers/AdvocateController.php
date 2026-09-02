<?php

namespace App\Http\Controllers;

use App\Models\Advocate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdvocateController extends Controller
{
    /**
     * Display the full list of advocates and paralegals.
     */
    public function index(): View
    {
        $allAdvocates = Advocate::orderByRaw("CASE role
            WHEN 'Senior Partner' THEN 1
            WHEN 'Partner' THEN 2
            WHEN 'Associate' THEN 3
            WHEN 'Paralegal' THEN 4
            ELSE 5 END")
            ->get();

        return view('advocates.index', compact('allAdvocates'));
    }

    /**
     * Display a single advocate's profile.
     */
    public function show(Advocate $advocate): View
    {
        return view('advocates.show', compact('advocate'));
    }
}
