<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationImageToNews extends Model
{
    use HasFactory;

    protected $table = 'relation_images_to_news';
    protected $fillable = [
        'id',
        'newsId',
        'imageId'
    ];
}
