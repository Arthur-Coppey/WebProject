<?php

use App\Notification;
use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::truncate();

        for ($i = 0; $i < 10; $i++){
            Notification::create([
                'response_status' => rand(0, 1),
                'user_id' => rand(1, 10),
                'idea_id' => rand(1, 10),
            ]);
        }
    }
}
