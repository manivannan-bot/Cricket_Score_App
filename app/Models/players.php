<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\players;

class players extends Model
{   public $timestamps = false;
    use HasFactory;

    public function teams(){
        return $this->BelongsTo(teams::class);
      }
}
