<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::truncate();
        for ($i = 0; $i < 10; $i++) {
            ProductCategory::create([
                'product_id' => rand(1, 10),
                'category_id' => rand(1, 2)
            ]);
        }
    }
}
