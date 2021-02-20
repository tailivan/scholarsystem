<?php

namespace App\Models;

use App\Models\Goal;
use App\Models\Team;
use App\Models\Poste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['poste_id', 'team_id', 'fname', 'lname', 'cat', 'age', 'taille', 'image'];

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }


    public function getNbbutsAttribute()
    {
        return Goal::where(function($query) {
                $query->where(function($query2) {
                    $query2->where('player_id', $this->attributes['id'])->whereRaw('id');
                });
            })
            ->count();
    }

    public function getNbassistAttribute()
    {
        return Goal::where(function($query) {
                $query->where(function($query2) {
                    $query2->where('assist_id', $this->attributes['id'])->whereRaw('id');
                });
            })
            ->count();
    }
}
