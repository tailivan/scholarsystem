<?php

namespace App\Models;

use App\Models\Pat;
use App\Models\Compet;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pat_id','image'];

    public function pat()
    {
        return $this->belongsTo(Pat::class);


    }

    public function players()
    {
        return $this->hasMany(Player::class);


    }

    public function getCompetsAttribute()
    {
        return Compet::where(function($query) {
            $query->where('team1_id', $this->attributes['id'])->orWhere('team2_id', $this->attributes['id']);
        })
        ->whereNotNull('score_1')
        ->count();
    }

    public function getWonAttribute()
    {
        return Compet::whereNotNull('score_1')
            ->where(function($query) {
                $query->where(function($query2) {
                    $query2->where('team1_id', $this->attributes['id'])->whereRaw('score_1 > score_2');
                })->orWhere(function($query2) {
                    $query2->where('team2_id', $this->attributes['id'])->whereRaw('score_1 < score_2');
                });
            })
            ->count();
    }

    public function getTiedAttribute()
    {
        return Compet::whereNotNull('score_1')
            ->whereRaw('score_1 = score_2')
            ->where(function($query) {
                $query->where('team1_id', $this->attributes['id'])
                    ->orWhere('team2_id', $this->attributes['id']);
            })
            ->count();
    }

    public function getLostAttribute()
    {
        return Compet::whereNotNull('score_1')
            ->where(function($query) {
                $query->where(function($query2) {
                    $query2->where('team1_id', $this->attributes['id'])->whereRaw('score_1 < score_2');
                })->orWhere(function($query2) {
                    $query2->where('team2_id', $this->attributes['id'])->whereRaw('score_1 > score_2');
                });
            })
            ->count();
    }

    public function getPointsAttribute()
    {
        return $this->getWonAttribute() * 3 + $this->getTiedAttribute() * 1;
    }

    
    
}
