<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth; // Import the Auth facade


class Operator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'operator_id',
        'operator_tel',
        'operator_mobile',
        'operator_no_acfts',
        'operator_location',
        'operator_email',
        'operator_website',
        'ops_contact_person',
        'ops_alternate_contact',
        'created_by',
        'updated_by',
        'active',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($operator) {
            $operator->created_by = Auth::id();
            $operator->operator_id = $operator->generateCustomOperatorId();
        });

        static::updating(function ($operator) {
            $operator->updated_by = Auth::id();
        });
    }

    // Custom method to generate operator ID
    private function generateCustomOperatorId()
    {
        return 'OP-' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generates an ID in the format OP-XXXX
    }
    public function aircrafts()
    {
        return $this->hasMany(Aircraft::class);
    }
}
