<?php

namespace App\Action;

use App\Models\Image;
use App\Models\News;
use App\Models\RelationImageToNews;
use App\Repository\NewsRepository;
use PHPUnit\Util\Xml\Exception;

trait GetNewsAction
{
    /** @var NewsRepository */
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     *
     */
    public function fire()
    {
        $updatedNewsCount = 0;
        try {
            $xml = simplexml_load_file('https://rus.delfi.lv/rss/?channel=rudailylatvia', 'SimpleXMLElement');

            if (empty($xml->channel->item->getName())) {
                throw new \UnexpectedValueException('tag item not found');
            }
            foreach ($xml->channel->item as $news) {
                if (empty($news->title->getName())
                    || empty($news->description->getName())
                    || empty($news->link->getName())
                ) {
                    throw new \UnexpectedValueException('item attributes not found');
                }

                if (!$this->newsRepository->newsExist((string)$news->link)) {
                    $newsModel = News::create(
                        [
                            'title' => $news->title,
                            'description' => $news->description,
                            'newsUrl' => (string)$news->link
                        ]
                    );

                    $newsModel->save();
                    $this->saveImage($news, $newsModel->id);
                    ++$updatedNewsCount;
                }
            }
        } catch (\Exception $exception) {
            throw new \Exception('XML file was not loaded');
        }

        return [
            'status ' => 200,
            'newNews' => $updatedNewsCount
        ];
    }

    /*
     *
     */
    private function saveImage(?\SimpleXMLElement $element, int $newsId)
    {
        if ($element) {
            $content = $element->children('media', true)->content;
            if (empty($content)) {
                return;
            }
            $attr = $content->attributes();

            foreach ($attr as $name => $value) {
                if ($name === 'url') {
                    $image = Image::firstOrCreate(['imageUrl' => $value]);
                    $image->save();

                    RelationImageToNews::create(
                        [
                            'newsId' => $newsId,
                            'imageId' => $image->id
                        ]
                    )->save();
                }
            }
        }
    }
}
