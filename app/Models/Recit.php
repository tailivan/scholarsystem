<?php

namespace App\Models;

use App\Models\Compet;
use App\Models\Writer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recit extends Model
{
    use HasFactory;

    protected $fillable = ['compet_id', 'writer_id', 'title', 'body', 'image'];

    public function compet()
    { 
        return $this->belongsTo(Compet::class);
    }

    public function writer()
    { 
        return $this->belongsTo(Writer::class);
    }

    
}
