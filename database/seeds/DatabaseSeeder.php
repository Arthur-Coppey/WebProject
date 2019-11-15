<?php

use App\Category;
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
            UsersTableSeeder::class,
            ProductsTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsCategoriesTableSeeder::class
            ]);
    }
}
