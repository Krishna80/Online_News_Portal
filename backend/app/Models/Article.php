<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'artid';
    protected $fillable = ['title', 'podate', 'category_id', 'content', 'author', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
