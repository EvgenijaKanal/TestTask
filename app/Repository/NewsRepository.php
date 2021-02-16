<?php

namespace App\Repository;

use \Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class NewsRepository
{
    /**
     * @param string $url
     *
     * @return object|null
     */
    public function newsExist(string $url): ?object
    {
        return DB::table('news')
            ->where('newsUrl', $url)
            ->first();
    }

    /**
     * @param string $str
     *
     * @return Collection|null
     */
    public function titlesByTerm(string $str): ?Collection
    {
        return DB::table('news')
            ->select('title')
            ->where('news.title', 'like', '%'.$str.'%')
            ->get();
    }
}
