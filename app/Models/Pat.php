<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'zip', 'image'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
