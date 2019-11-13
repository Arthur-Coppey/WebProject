<?php

use App\Picture;
use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Picture::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            $eventOrProduct = rand(1, 2);
            if($eventOrProduct = 0){
                Picture::create([
                    'URI' => $faker->url,
                    'user_id' => rand(1, 10),
                    'event_id' => rand(1, 10),
            ]);
            }else {
                Picture::create([
                    'URI' => $faker->url,
                    'user_id' => rand(1, 10),
                    'product_id' => rand(1, 10),
                ]);
            }
        }
    }
}
