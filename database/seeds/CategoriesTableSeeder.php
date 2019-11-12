<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
