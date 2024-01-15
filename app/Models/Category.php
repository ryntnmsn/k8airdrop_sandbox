<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'language_id'];

    public function language() {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function blog() {
        return $this->hasMany(Blog::class);
    }
}
