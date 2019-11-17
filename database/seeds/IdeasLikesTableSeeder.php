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
        IdeaLike::truncate();
        for ($i = 0; $i < 10; $i++){
            IdeaLike::create([
                'like' => rand(0, 1),
                'user_id' => rand(1, 10),
                'idea_id' => rand(1, 10),
            ]);
        }
    }
}
