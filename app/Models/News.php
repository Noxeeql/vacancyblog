<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'image', 'date'];
    public $timestamps = false;
    use HasFactory;

    public function tags()
    {
        return $this->hasMany(NewsTag::class);
    }

    public function comments()
    {
        // return $this->hasMany(Comment::className(), ['news_id' => 'id']);
        return $this->hasMany(Comment::class);
    }
}
