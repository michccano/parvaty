<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class droplet extends Model
{
       protected $fillable = [
        'droplet_id','email','status','wpinfo','droplet_name'
    ];
}
