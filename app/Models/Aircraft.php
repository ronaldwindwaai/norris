<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class Aircraft extends Model
{
    use HasFactory;

    protected $table = 'aircrafts';

    protected $fillable = [
        'elt_registration_id',
        'aircraft_registration',
        'aircraft_type',
        'operator_name',
        'hex_id',
        'contact_person',
        'first_telephone_number',
        'second_telephone_number',
        'third_telephone_number',
        'email',
        'protocol_type',
        'elt_code',
        'mode_s_address',
        'navigation_source',
        'website',
        'date_entered',
        'beacon',
        'beacon_model',
        'homing_121_5',
        'mhz_406',
        'notes',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($aircraft) {
            $aircraft->created_by = Auth::id();
        });

        static::updating(function ($aircraft) {
            $aircraft->updated_by = Auth::id();
        });
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function aircraftType()
    {
        return $this->belongsTo(AircraftType::class);
    }
}
