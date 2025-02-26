<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesSeeder extends Seeder
{
    public function run()
    {
        DB::table('places')->insert([
            ['name' => 'Tokyo', 'visited' => false],
            ['name' => 'Budapest', 'visited' => true],
            ['name' => 'Nairobi', 'visited' => false],
            ['name' => 'Berlin', 'visited' => true],
            ['name' => 'Lisbon', 'visited' => true],
            ['name' => 'Denver', 'visited' => false],
            ['name' => 'Moscow', 'visited' => false],
            ['name' => 'Olso', 'visited' => false],
            ['name' => 'Rio', 'visited' => true],
            ['name' => 'Cincinnati', 'visited' => false],
            ['name' => 'Helsinki', 'visited' => false],
        ]);
    }
}