<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class summary extends Model

{   public $timestamps = false;

    protected $table = 'summaries';
    protected $fillable = [
        'match_id',
    ];


    use HasFactory;
}
