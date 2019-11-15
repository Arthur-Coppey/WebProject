<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            CentersTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class
            ]);
    }
}
