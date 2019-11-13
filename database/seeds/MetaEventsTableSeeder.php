<?php

use App\MetaEvent;
use Illuminate\Database\Seeder;

class MetaEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetaEvent::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            MetaEvent::create([
                'label' => $faker->lastName,
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'location' => 'salle '.rand(101, 109),
                'start_date' => $faker->date($format = 'Y-m-d', $min = 'now'),
                'occurrences' => rand(1, 10),
                'frequency' => 7,
                'price' => 10.00,
                'user_id' => rand(1, 10)
            ]);
        }
    }
}
