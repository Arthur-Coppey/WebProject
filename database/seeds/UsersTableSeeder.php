<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++){
            $first_name = $faker->firstName();
            $last_name = $faker->lastName;
            User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => strtolower($first_name.'.'.$last_name.'@viacesi.fr'),
                'password' => $faker->password,
                'role_id' => rand(1, 3),
                'center_id' => rand(1, 12),
            ]);
        }
    }
}
