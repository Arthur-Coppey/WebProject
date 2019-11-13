<?php
use App\Basket;
use Illuminate\Database\Seeder;

class BasketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Basket::truncate();
        for ($i = 0; $i < 10; $i++){
        Basket::create([
            'amount' => rand(1, 6),
            'user_id' => rand (1, 10),
            'product_id' => rand(1, 10)
        ]);
        }
    }
}
