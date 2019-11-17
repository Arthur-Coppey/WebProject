<?php

use App\OrderContent;
use Illuminate\Database\Seeder;

class OrdersContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderContent::truncate();
        for ($i = 0; $i < 10; $i++){
        OrderContent::create([
            'amount' => rand(1, 10),
            'product_id' => rand(1,10),
            'order_id' => rand(1, 10)
        ]);
    }
    }
}
