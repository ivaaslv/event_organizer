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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreign_id('event_id')->constrained()->OnDelete('Cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('institution')->nullable();
            $table->string('registration_code')->unique();
            $table->enmum('status', ['pending', 'confirmed', 'cancelled'])->default('confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
