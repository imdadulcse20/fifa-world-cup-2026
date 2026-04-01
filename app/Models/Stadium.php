<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['full_image_url'];

    public function getFullImageUrlAttribute()
    {
        return $this->image_url ? (str_starts_with($this->image_url, 'http') ? $this->image_url : url($this->image_url)) : null;
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
