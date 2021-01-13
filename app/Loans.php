<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $guarded = [];

    public function members()
    {
        return $this->belongsTo(members::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
