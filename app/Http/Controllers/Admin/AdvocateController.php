<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advocate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdvocateController extends Controller
{
    /**
     * Display a listing with optional search.
     */
    public function index(Request $request): View
    {
        $query = Advocate::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('role', 'like', '%'.$request->search.'%');
        }

        $advocates = $query->latest()->paginate(10)->withQueryString();

        return view('admin.advocates.index', compact('advocates'));
    }

    /**
     * Show the form for creating a new advocate.
     */
    public function create(): View
    {
        return view('admin.advocates.create');
    }

    /**
     * Store a newly created advocate.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'short_story' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('advocates', 'public');
        }

        unset($validated['image']);

        Advocate::create($validated);

        return redirect()->route('admin.advocates.index')
            ->with('success', 'Advokat berhasil ditambahkan.');
    }

    /**
     * Show the form for editing an advocate.
     */
    public function edit(Advocate $advocate): View
    {
        return view('admin.advocates.edit', compact('advocate'));
    }

    /**
     * Update an existing advocate.
     */
    public function update(Request $request, Advocate $advocate): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'short_story' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($advocate->image_path) {
                Storage::disk('public')->delete($advocate->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('advocates', 'public');
        }

        unset($validated['image']);

        $advocate->update($validated);

        return redirect()->route('admin.advocates.index')
            ->with('success', 'Advokat berhasil diperbarui.');
    }

    /**
     * Delete an advocate and its associated image.
     */
    public function destroy(Advocate $advocate): RedirectResponse
    {
        if ($advocate->image_path) {
            Storage::disk('public')->delete($advocate->image_path);
        }

        $advocate->delete();

        return redirect()->route('admin.advocates.index')
            ->with('success', 'Advokat berhasil dihapus.');
    }
}
