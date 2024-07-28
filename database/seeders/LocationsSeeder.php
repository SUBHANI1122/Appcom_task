<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Dubai', 'parent_id' => null],
            ['name' => 'Sharjah', 'parent_id' => null],
            ['name' => 'Abu Dhabi', 'parent_id' => null],
            ['name' => 'Ajman', 'parent_id' => null],
            ['name' => 'Ras Al Khaimah', 'parent_id' => null],
            ['name' => 'Umm Al Quwain', 'parent_id' => null],
            ['name' => 'Fujairah', 'parent_id' => null],
        ];

        DB::table('locations')->insert($states);

        $cities = [
            ['name' => 'City1', 'parent_id' => 1],  
            ['name' => 'City2', 'parent_id' => 2], 
            ['name' => 'City3', 'parent_id' => 3], 
            ['name' => 'City4', 'parent_id' => 4], 
            ['name' => 'City5', 'parent_id' => 5], 
            ['name' => 'City6', 'parent_id' => 6], 
            ['name' => 'City7', 'parent_id' => 7],
        ];

        DB::table('locations')->insert($cities);
    }
}
