<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                Role::truncate();
                $roles=['user', 'BDE-staff', 'CESI-staff'];
                foreach($roles as $role){
                Role::create([
                    'role' => $role,
                ]);
            }
    }
}
