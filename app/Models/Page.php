<?php

namespace App\Models;

use App\Traits\Locale;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Page extends Model
{
    use Locale;
    use Searchable;

    public $asYouType = true;

    public function toSearchableArray()
    {
        return $this->only(['id','title_ru', 'title_ua', 'content_ru', 'content_ua']);
    }

    public function menu(){
        return $this->hasMany(Menu::class, 'url', 'url');
    }

    public function scopeActive($query){

        $active_pages = Menu::where('active',1)
            ->get()
            ->map(function ($item){
            return $item->url;
        });

        return $query->whereIn('url', $active_pages);
    }

}
