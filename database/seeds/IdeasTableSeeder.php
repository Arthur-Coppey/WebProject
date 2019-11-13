<?php

use App\Idea;
use Illuminate\Database\Seeder;

class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Idea::troncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            Idea::create([
                'title' => $faker->lastName,
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'user_id' => rand(1, 10)
            ]);
        }
    }
}
