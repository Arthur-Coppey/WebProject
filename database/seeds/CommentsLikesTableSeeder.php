<?php

use App\CommentLike;
use Illuminate\Database\Seeder;

class CommentsLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommentLike::truncate();
        for ($i = 0; $i < 50; $i++) {
            CommentLike::create([
                'user_id' => rand(1, 10),
                'comment_id' => rand(1,10),
                'like' => rand(0,1)
            ]);
        }
    }
}
