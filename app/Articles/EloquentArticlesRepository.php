<?php

namespace App\Articles;

use App\Article;

class EloquentArticlesRepository implements ArticlesRepository
{
    public function search($query = "")
    {
        return Article::where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->get();
    }
}