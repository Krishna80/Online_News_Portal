<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'artid';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'title', 'podate', 'category_id', 'content', 'author', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
