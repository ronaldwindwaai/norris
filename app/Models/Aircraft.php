<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aircraft extends Model
{
    use HasFactory;

    protected $table = 'aircrafts';

    protected $fillable = [
        'registration',
        'elt_serial_number',
        'elt_manufacturer',
        '406_mhz_capability',
        'operator_name',
        'contact_primary',
        'contact_secondary',
        'email',
        'physical_address',
        'aircraft_type',
    ];
}
