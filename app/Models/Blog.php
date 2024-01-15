<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function language() {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }
}
