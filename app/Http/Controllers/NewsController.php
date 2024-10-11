<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)
            ->latest()
            ->paginate(9);
        return view('news.index', compact('news'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        
        // Ambil berita terkait (opsional)
        $relatedNews = News::where('id', '!=', $news->id)
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }
}