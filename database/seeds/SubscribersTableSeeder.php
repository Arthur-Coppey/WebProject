<?php

use App\Subscriber;
use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscriber::truncate();
        for ($i = 0; $i < 10; $i++){
            Subscriber::create([
                'user_id' => rand(1, 10),
                'meta_event_id' => rand(1, 10),
            ]);
        }
    }
}
