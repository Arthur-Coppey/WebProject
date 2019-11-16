<?php

use App\Picture;
use Faker\Factory;
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
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++){
            $eventOrProduct = rand(0, 1);
            if($eventOrProduct){
                Picture::create([
                    'URI' => $faker->imageUrl(640, 480, 'cats'),
                    'user_id' => rand(1, 10),
                    'event_id' => rand(1, 10),
            ]);
            }else {
                Picture::create([
                    'URI' => $faker->imageUrl(640,480, 'cats'),
                    'user_id' => rand(1, 10),
                    'product_id' => rand(1, 10),
                ]);
            }
        }
    }
}
