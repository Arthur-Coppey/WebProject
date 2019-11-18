<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            Order::create([
                'date' => $faker->date($format = 'Y-m-d', $min = 'now'),
                'price' => 10.00,
                'user_id' => rand(1,10)
            ]);
        }
    }
}
