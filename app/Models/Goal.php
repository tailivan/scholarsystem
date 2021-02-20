<?php

namespace App\Models;


use App\Models\Compet;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goal extends Model
{
    use HasFactory;

    public function match()
    {
        return $this->belongsTo(Compet::class, 'compet_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function assist()
    {
        return $this->belongsTo(Player::class, 'assist_id');
    }

    
}
