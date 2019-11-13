<?php

use App\Participant;
use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Particpant::truncate();
        for ($i = 0; $i < 10; $i++){
            Particpant::create([
                'user_id' => rand(1, 10),
                'event_id' => rand(1, 10),

            ]);
        }
    }
}
