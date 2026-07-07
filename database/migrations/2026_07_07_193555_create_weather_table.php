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
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->string('city', 255);
            $table->decimal('temperature', 4, 1);
            $table->string('condition', 60);
            $table->unsignedTinyInteger('chance_to_rain');
            $table->unsignedTinyInteger('humidity');
            $table->unsignedSmallInteger('wind_speed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
