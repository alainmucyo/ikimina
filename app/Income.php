<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded=[];

    public function cooperative(){
        return $this->belongsTo(Cooperative::class);
    }
}
