<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display all news articles (paginated).
     */
    public function index(): View
    {
        $news = News::latest()->paginate(9);

        return view('news.index', compact('news'));
    }

    /**
     * Display a single news article, or redirect to external URL.
     */
    public function show(News $news): View|RedirectResponse
    {
        if ($news->isExternal() && $news->external_url) {
            return redirect()->away($news->external_url);
        }

        $relatedNews = News::where('id', '!=', $news->id)
            ->where('type', 'internal')
            ->latest()
            ->take(2)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }
}
