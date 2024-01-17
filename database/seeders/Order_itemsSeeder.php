<?php

namespace Database\Seeders;

use App\Models\Order_items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Order_itemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order_items::factory()->count(10)->create();

    }
}
