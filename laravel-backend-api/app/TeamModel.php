<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
     protected $fillable = [
        'name','description','userid'
    ];
}
