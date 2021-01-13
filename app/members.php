<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    protected $guarded=[];

    public function contributions(){
        return $this->hasMany(Contribution::class);
    }

    public function loan(){
        return $this->hasOne(Loans::class)->where('status',"==",0);
    }

    public function cooperative(){
        return $this->belongsTo(Cooperative::class);
    }

}
