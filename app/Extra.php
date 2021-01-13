<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $guarded = [];

    public function contribution()
    {
        return $this->belongsTo(Contribution::class);
    }
}
