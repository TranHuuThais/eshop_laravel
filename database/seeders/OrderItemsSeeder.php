<?php

namespace Database\Seeders;

use App\Models\OrderItems;
use Illuminate\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderItems::factory()->count(10)->create();

    }
}
