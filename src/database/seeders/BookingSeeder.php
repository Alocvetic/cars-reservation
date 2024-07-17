<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = BookingService::getDefList();

        foreach ($bookings as $booking) {
            Booking::factory()
                ->setCarId($booking['car_id'])
                ->setBookFrom($booking['book_from'])
                ->setBookTo($booking['book_to'])
                ->create();
        }
    }
}
