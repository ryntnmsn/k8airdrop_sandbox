<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'answers', 'promo_id', 'question_id', 'participant_id', 'url_id'
    ];

    public function participant() {
        return $this->belongsTo(Participant::class);
    }
}
