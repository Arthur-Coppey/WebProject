<?php

use App\Center;
use Illuminate\Database\Seeder;

class CentersTableSeeder extends Seeder
{
    public function run()
    {
        Center::truncate();

        $centers=['Bordeaux', 'Lille', 'Arras', 'Rouen', 'Caen', 'Brest', 'Reims', 'Nancy', 'Strasbourg', 'Saint-Nazaire', 'Nantes', 'Châteauroux', 'Dijon', 'La Rochelle', 'Angoulême', 'Lyon', 'Grenoble', 'Pau', 'Toulouse', 'Montpellier', 'Aix-en-Provence', 'Nice'];
        foreach($centers as $center){
        Center::create([
            'name' => $center,
        ]);
    }
    }
}