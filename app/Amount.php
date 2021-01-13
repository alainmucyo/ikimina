<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Amount extends Model
{
    protected $guarded=[];


    public function cooperative(){
        return $this->belongsTo(Cooperative::class);
    }

}
