<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function amount()
    {
        return $this->hasMany(Amount::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function members()
    {
        return $this->hasMany(members::class);
    }

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function extras()
    {
        return $this->hasMany(Extra::class);
    }

}
