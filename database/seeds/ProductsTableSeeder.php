<?php

use App\Product;
use Faker\Factory;
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
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++){
            Product::create([
                'label' => $faker->lastName,
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(5, 25),
                'center_id' => rand(1, 12),
                'category_id' => rand(1, 2)
            ]);
        }
    }
}
