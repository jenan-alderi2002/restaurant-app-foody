<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rates = [
            ['user_id' => 2, 'food_id' => 4, 'Ratings' => 3,  'avgRatings' => 3.33],
            ['user_id' => 3, 'food_id' => 6, 'Ratings' => 2,  'avgRatings' => 1.5],
            ['user_id' => 4, 'food_id' => 6, 'Ratings' => 1,  'avgRatings' => 1.5],
            ['user_id' => 5, 'food_id' => 2, 'Ratings' => 5,  'avgRatings' => 4.5],
            ['user_id' => 6, 'food_id' => 2, 'Ratings' => 4,  'avgRatings' => 4.5],
            ['user_id' => 7, 'food_id' => 4, 'Ratings' => 4,  'avgRatings' => 3.33],
            ['user_id' => 8, 'food_id' => 4, 'Ratings' => 3,  'avgRatings' => 3.33],
            ['user_id' => 9, 'food_id' => 8, 'Ratings' => 2,  'avgRatings' => 1.5],
            ['user_id' => 10, 'food_id'=> 8, 'Ratings' => 1,  'avgRatings' => 1.5],
];
DB::table('rates')->insert($rates);
        
    }
}
