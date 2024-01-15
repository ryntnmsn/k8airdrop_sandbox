<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'question_id' => 'array',
    ];

    public function promos() {
        return $this->belongsTo(Promo::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }
    
    public function participants() {
        return $this->belongsToMany(Participant::class, 'participant_choice');
    }
}
