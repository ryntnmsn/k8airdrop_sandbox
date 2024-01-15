<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['start_date','end_date'];
    public function platforms() {
        return $this->belongsToMany(Platform::class, 'platform_promo');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'promo_user');
    }

    public function codes() {
        return $this->belongsToMany(Code::class, 'code_promo');
    }

    public function participants() {
        return $this->belongsToMany(Participant::class, 'participant_promo');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language() {
        return $this->belongsTo(Language::class);
    }
}
