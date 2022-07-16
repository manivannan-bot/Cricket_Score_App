<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score_card extends Model
{   public $timestamps = false;
    protected $fillable = [
        'player_id'
    ];
    use HasFactory;
}
