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
        Category::truncate();
        $categories=['goodies', 'pulls'];
        foreach($categories as $categorie){
            Category::create([
                'label' => $categorie,
            ]);
        }
    }
}
