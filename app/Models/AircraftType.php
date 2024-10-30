<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AircraftType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function aircrafts()
    {
        return $this->hasMany(Aircraft::class);
    }
}
