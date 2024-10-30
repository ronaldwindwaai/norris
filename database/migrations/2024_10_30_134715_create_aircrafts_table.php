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
            $table->string('elt_registration_id')->unique()->nullable(); // Ensure unique constraint is applied correctly
            $table->string('aircraft_registration')->nullable();
            $table->foreignId('aircraft_type_id')->constrained()->default(1); // Set default to an existing aircraft type ID
            $table->foreignId('operator_id')->constrained()->default(1); // Set default to an existing operator ID
            $table->string('hex_id')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('first_telephone_number')->nullable();
            $table->string('second_telephone_number')->nullable();
            $table->string('third_telephone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('protocol_type')->nullable();
            $table->string('elt_code')->nullable();
            $table->string('mode_s_address')->nullable();
            $table->string('navigation_source')->nullable();
            $table->string('website')->nullable();
            $table->date('date_entered')->nullable();
            $table->string('beacon')->nullable();
            $table->string('beacon_model')->nullable();
            $table->boolean('homing_121_5')->default(false);
            $table->boolean('mhz_406')->default(false);
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
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
