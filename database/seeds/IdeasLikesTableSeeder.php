<?php

use App\IdeaLike;
use Illuminate\Database\Seeder;

class IdeasLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IdeasLike::truncate();
        for ($i = 0; $i < 10; $i++){
            IdeasLike::create([
                'like' => 1,
                'user_id' => rand(1, 10),
                'idea_id' => rand(1, 10),
            ]);
        }
    }
}
