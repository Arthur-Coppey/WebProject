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
        Participant::truncate();
        for ($i = 0; $i < 10; $i++){
            Participant::create([
                'user_id' => rand(1, 10),
                'event_id' => rand(1, 10),

            ]);
        }
    }
}
