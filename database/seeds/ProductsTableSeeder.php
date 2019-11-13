<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            Product::create([
                'label' => $faker->lastName,
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => '10.00',
                'center_id' => rand(1, 12)
            ]);
        }
    }
}
