<?php

use App\Models\{ComfortCar, Position};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comfort_car_position', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ComfortCar::class);
            $table->foreignIdFor(Position::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comfort_car_position');
    }
};
