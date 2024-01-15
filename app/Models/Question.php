<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'question_id' => 'array',
        ];


    public function promos() {
        return $this->belongsTo(Promo::class);
    }

    public function choices() {
        return $this->hasMany(Choice::class);
    }

    public function participants() {
        return $this->belongsToMany(Participant::class, 'participant_choice');
    }

    public function comments() {
        return $this->belongsTo(Comment::class);
    }

}
