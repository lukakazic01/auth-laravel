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
        Schema::table('weather', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->foreignId('city_id')->nullable()->after('id')->constrained('cities')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weather', function (Blueprint $table) {
            $table->dropForeign('weather_city_id_foreign');
            $table->dropColumn('city_id');
            $table->string('city', 255)->after('id');
        });
    }
};
