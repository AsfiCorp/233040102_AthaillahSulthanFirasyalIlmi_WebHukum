<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index(): View
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'matter_summary' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        // Log the inquiry for now (can be wired to Mail in future)
        Log::info('New contact inquiry from '.$validated['full_name'], $validated);

        return redirect()->route('contact')->with('success', 'Terima kasih! Pertanyaan Anda telah kami terima. Tim kami akan segera menghubungi Anda.');
    }
}
