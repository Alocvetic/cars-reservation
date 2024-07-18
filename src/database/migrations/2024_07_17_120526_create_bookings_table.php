<?php

use App\Models\{Car, Employee};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Car::class);
            $table->foreignIdFor(Employee::class);
            $table->timestamp('book_from')->nullable();
            $table->timestamp('book_to')->nullable();
            $table->timestamps();

            $table->index('car_id');
            $table->index('employee_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
