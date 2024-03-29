<?php

use App\Comment;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++){
            $eventOrIdea = rand(0, 1);
            if($eventOrIdea){
                Comment::create([
                    'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'user_id' => rand(1, 10),
                    'event_id' => rand(1, 10),
                ]);
            }else {
                Comment::create([
                    'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'user_id' => rand(1, 10),
                    'idea_id' => rand(1, 10),
                ]);
            }
        }
    }
}
