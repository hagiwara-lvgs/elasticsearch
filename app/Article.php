<?php

namespace App;

use App\Observers\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Searchable;

    protected $casts = [
        'tags' => 'json'
    ];
}
