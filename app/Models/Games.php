<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_name',
        'description',
        'player_name',
        'player_id',
        'played_on'
    ];

    public function container() {
        return $this->belongsTo('App\Models\Games');
    }
}
