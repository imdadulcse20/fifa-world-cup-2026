<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use Carbon\Carbon;

class Game extends Model
{
    use HasFactory;

    protected $table = 'matches';
    protected $guarded = [];

    protected $appends = ['slug'];

    public function getSlugAttribute()
    {
        $home = $this->homeTeam ? $this->homeTeam->name : ($this->home_team_placeholder ?: 'TBA');
        $away = $this->awayTeam ? $this->awayTeam->name : ($this->away_team_placeholder ?: 'TBA');
        return Str::slug($home . ' vs ' . $away);
    }

    public function getGroundTimeAttribute()
    {
        return Carbon::parse($this->match_date_utc)
            ->timezone($this->stadium->timezone ?? 'UTC')
            ->format('H:i');
    }

    public function getGroundDateAttribute()
    {
        return Carbon::parse($this->match_date_utc)
            ->timezone($this->stadium->timezone ?? 'UTC')
            ->format('M d, Y');
    }

    public function getGroundTimeFullAttribute()
    {
        $dt = Carbon::parse($this->match_date_utc)
            ->timezone($this->stadium->timezone ?? 'UTC');
        
        return $dt->format('F d, Y, g:i a') . ' UTC' . $dt->format('P');
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function stadium()
    {
        return $this->belongsTo(Stadium::class);
    }

    public function matchEvents()
    {
        return $this->hasMany(MatchEvent::class, 'match_id');
    }
}
