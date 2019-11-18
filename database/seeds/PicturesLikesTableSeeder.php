<?php

use App\PictureLike;
use Illuminate\Database\Seeder;

class PicturesLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PictureLike::truncate();
        for ($i = 0; $i < 50; $i++) {
            PictureLike::create([
                'picture_id' => rand(1, 10),
                'user_id' => rand(1, 10),
                'like' => rand(0, 1)
            ]);
        }
    }
}
