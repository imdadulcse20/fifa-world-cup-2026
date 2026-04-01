<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['full_flag_url'];

    public function getFullFlagUrlAttribute()
    {
        return $this->flag_url ? url($this->flag_url) : null;
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function homeGames()
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function awayGames()
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }

    public function standing()
    {
        return $this->hasOne(Standing::class);
    }
}
