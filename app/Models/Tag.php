<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'language_id'];
    use HasFactory;

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function blogs() {
        return $this->belongsToMany(Blog::class, 'blog_tag');
    }

    public function blog() {
        return $this->hasMany(Blog::class);
    }
}