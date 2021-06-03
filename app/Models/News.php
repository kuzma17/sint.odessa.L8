<?php

namespace App\Models;

use App\Traits\Locale;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class News extends Model
{
    use Locale;
    use Searchable;

    protected $table = 'news';
    public $asYouType = true;

    public function toSearchableArray()
    {
        return $this->only(['id','title_ru', 'title_ua', 'content_ru', 'content_ua']);
    }

    public static function count(){
        return Settings::find(1)->count_news;
    }

    public function scopeActive($query){
        return $query->where('published', 1);
    }

}
