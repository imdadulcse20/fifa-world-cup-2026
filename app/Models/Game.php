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

    protected $appends = ['slug', 'ground_time', 'ground_date', 'ground_time_full'];

    protected static function booted()
    {
        static::updated(function ($match) {
            if ($match->status === 'finished') {
                // If status changed to finished, or if it was already finished but scores changed
                if ($match->wasChanged('status') || $match->wasChanged('home_score') || $match->wasChanged('away_score')) {
                    static::syncMatchStandings($match);
                }
            }
        });

        static::created(function ($match) {
            if ($match->status === 'finished') {
                static::syncMatchStandings($match);
            }
        });
    }

    protected static function syncMatchStandings($match)
    {
        $homeTeamId = $match->home_team_id;
        $awayTeamId = $match->away_team_id;

        if ($homeTeamId) static::syncTeamStanding($homeTeamId);
        if ($awayTeamId) static::syncTeamStanding($awayTeamId);
    }

    protected static function syncTeamStanding($teamId)
    {
        $team = Team::find($teamId);
        if (!$team) return;

        $matches = static::where('status', 'finished')
            ->where(function ($q) use ($teamId) {
                $q->where('home_team_id', $teamId)->orWhere('away_team_id', $teamId);
            })->get();

        $stats = [
            'played' => 0, 'won' => 0, 'drawn' => 0, 'lost' => 0,
            'goals_for' => 0, 'goals_against' => 0, 'points' => 0
        ];

        foreach ($matches as $m) {
            $stats['played']++;
            $isHome = $m->home_team_id == $teamId;
            $teamScore = $isHome ? $m->home_score : $m->away_score;
            $oppScore = $isHome ? $m->away_score : $m->home_score;

            $stats['goals_for'] += $teamScore;
            $stats['goals_against'] += $oppScore;

            if ($teamScore > $oppScore) {
                $stats['won']++;
                $stats['points'] += 3;
            } elseif ($teamScore == $oppScore) {
                $stats['drawn']++;
                $stats['points'] += 1;
            } else {
                $stats['lost']++;
            }
        }

        Standing::updateOrCreate(
            ['team_id' => $teamId],
            array_merge($stats, [
                'group_name' => $team->group_name,
                'goal_difference' => $stats['goals_for'] - $stats['goals_against']
            ])
        );
    }

    public function getAiPredictionAttribute()
    {
        if (!$this->homeTeam || !$this->awayTeam) return null;

        $homeRank = $this->homeTeam->fifa_rank;
        $awayRank = $this->awayTeam->fifa_rank;

        // Base probability calculation based on ranking (lower rank is better)
        $totalRank = $homeRank + $awayRank;
        $homeProb = 1 - ($homeRank / $totalRank);
        $awayProb = 1 - ($awayRank / $totalRank);

        // Normalize
        $sum = $homeProb + $awayProb;
        $homeProb = ($homeProb / $sum) * 100;
        $awayProb = ($awayProb / $sum) * 100;

        // Home advantage boost
        $homeProb += 5;
        $awayProb -= 5;

        // Draw probability based on rank closeness
        $rankDiff = abs($homeRank - $awayRank);
        $drawProb = max(10, 30 - ($rankDiff * 0.5));

        // Re-normalize to 100%
        $total = $homeProb + $awayProb + $drawProb;
        
        return [
            'home' => round(($homeProb / $total) * 100),
            'away' => round(($awayProb / $total) * 100),
            'draw' => round(($drawProb / $total) * 100),
            'verdict' => ($homeRank < $awayRank) ? $this->homeTeam->name : $this->awayTeam->name
        ];
    }

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

    public function stats()
    {
        return $this->hasOne(MatchStat::class, 'match_id');
    }

    public function lineups()
    {
        return $this->hasMany(MatchLineup::class, 'match_id');
    }

    public function predictions()
    {
        return $this->hasMany(Prediction::class, 'match_id');
    }
}
