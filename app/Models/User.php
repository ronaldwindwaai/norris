<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function createdOperators()
    {
        return $this->hasMany(Operator::class, 'created_by');
    }

    public function updatedOperators()
    {
        return $this->hasMany(Operator::class, 'updated_by');
    }

    public function createdAircrafts()
    {
        return $this->hasMany(Aircraft::class, 'created_by');
    }

    public function updatedAircrafts()
    {
        return $this->hasMany(Aircraft::class, 'updated_by');
    }

    public function createdAircraftTypes()
    {
        return $this->hasMany(AircraftType::class, 'created_by');
    }

    public function updatedAircraftTypes()
    {
        return $this->hasMany(AircraftType::class, 'updated_by');
    }

}
