<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $guarded=[];

    public function member(){
        return $this->belongsTo(members::class);
    }
    public function extra(){
        return $this->hasOne(Extra::class);
    }
}
