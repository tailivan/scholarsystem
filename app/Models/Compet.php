<?php

namespace App\Models;

use App\Models\Goal;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compet extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'heure', 'team_1', 'team_2', 'score_1', 'score_2'];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class, 'compet_id');
    }

   
   
}
