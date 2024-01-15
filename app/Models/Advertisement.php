<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['language_id','user_id','name','img_url','img_website','video_url','video_website','status','layout'];
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language() {
        return $this->belongsTo(Language::class);
    }
}
