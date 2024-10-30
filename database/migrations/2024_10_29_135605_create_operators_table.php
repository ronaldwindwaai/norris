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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('operator_id')->nullable();
            $table->string('name');
            $table->string('operator_tel')->nullable();
            $table->string('operator_mobile')->nullable();
            $table->integer('operator_no_acfts')->nullable();
            $table->string('operator_location')->nullable();
            $table->string('operator_email')->nullable();
            $table->string('operator_website')->nullable();
            $table->string('ops_contact_person')->nullable();
            $table->string('ops_alternate_contact')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
