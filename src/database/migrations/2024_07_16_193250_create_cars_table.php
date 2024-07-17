<?php

use App\Models\{ComfortCar, Driver};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('register_number')->unique();
            $table->string('model');
            $table->foreignIdFor(Driver::class);
            $table->foreignIdFor(ComfortCar::class);
            $table->boolean('is_access')->default(true);
            $table->timestamps();

            $table->index('register_number');
            $table->index('model');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
