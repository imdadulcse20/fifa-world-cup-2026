<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'session_id',
        'choice'
    ];

    public function match()
    {
        return $this->belongsTo(Game::class, 'match_id');
    }
}
