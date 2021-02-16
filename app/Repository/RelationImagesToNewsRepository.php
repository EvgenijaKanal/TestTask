<?php


namespace App\Repository;

use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class RelationImagesToNewsRepository
{
    /**
     * @return LengthAwarePaginator|null
     */
    public function list(): ?LengthAwarePaginator
    {
        return DB::table('relation_images_to_news')
            ->join('news', 'news.id', '=', 'relation_images_to_news.newsId')
            ->join('images', 'images.id', '=', 'relation_images_to_news.imageId')
            ->select('news.*', 'images.*')
            ->paginate(5);
    }

    /**
     * @param string $term
     *
     * @return LengthAwarePaginator
     */
    public function listByTitleTerm(string $term): ?LengthAwarePaginator
    {
        return DB::table('relation_images_to_news')
            ->join('news', 'news.id', '=', 'relation_images_to_news.newsId')
            ->join('images', 'images.id', '=', 'relation_images_to_news.imageId')
            ->select('news.*', 'images.*')
            ->where('news.title', 'like', '%'.$term.'%')
            ->paginate(5);
    }

}
