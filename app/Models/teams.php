<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\players;

class teams extends Model
{     public $timestamps = false;
      //use HasFactory;

      public function players(){
        return $this->hasOne(players::class);
      }
}
