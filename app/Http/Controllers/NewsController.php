<?php

namespace App\Http\Controllers;

use App\Repository\NewsRepository;
use App\Repository\RelationImagesToNewsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class NewsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function indexAction()
    {
        return view('news')->with('news', '$news');
    }

    /**
     * @param RelationImagesToNewsRepository $relationImagesToNewsRepository
     * @param Request                        $request
     *
     * @return LengthAwarePaginator
     */
    public function getListAction(
        RelationImagesToNewsRepository $relationImagesToNewsRepository,
        Request $request
    ): LengthAwarePaginator {
        if ($str = $request->get('str')) {
            $str = json_decode($str, false, 1000, JSON_UNESCAPED_UNICODE);
            return $relationImagesToNewsRepository->listByTitleTerm(trim($str));
        }
        return $relationImagesToNewsRepository->list();
    }

    /**
     * @param NewsRepository $newsRepository
     * @param Request        $request
     *
     * @return mixed
     */
    public function searchAction(
        NewsRepository $newsRepository,
        Request $request
    ) {
        if ($str = $request->get('str')) {
            return $newsRepository->listByTitleTerm($str);
        }
    }

    /**
     * @param NewsRepository $newsRepository
     * @param Request        $request
     *
     * @return Collection
     */
    public function searchTitleAction(
        NewsRepository $newsRepository,
        Request $request
    ): Collection {
        if ($str = $request->get('str')) {
            return $newsRepository->titlesByTerm($str);
        }
    }
}
