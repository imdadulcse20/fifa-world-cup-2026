<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchStat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function match()
    {
        return $this->belongsTo(Game::class, 'match_id');
    }
}
