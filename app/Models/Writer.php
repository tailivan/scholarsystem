<?php

namespace App\Models;

use App\Models\Recit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Writer extends Model
{
    use HasFactory;

    protected $fillable =['team_id', 'fname', 'lname', 'portrait'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function recits()
    {
        return $this->hasMany(Recit::class);
    }
}
