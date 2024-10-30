<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aircrafts', function (Blueprint $table) {
            $table->id();
            $table->string('registration');
            $table->string('elt_serial_number');
            $table->string('elt_manufacturer');
            $table->boolean('406_mhz_capability');
            $table->string('operator_name');
            $table->string('contact_primary');
            $table->string('contact_secondary')->nullable();
            $table->string('email')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('aircraft_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircrafts');
    }
};
