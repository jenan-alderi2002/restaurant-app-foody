<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Detail;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $details = [
            [  'name'=>'foody',
            'location'=>'Damascus',
            'phone'=>'0936577272',
            'time_in'=>'12:00 BM',
            'time_out'=>'12:00 AM',
            'discraption'=>'wlecom',
            'number_table'=>10,
            'number_chair'=>40,
            'user_id'=>1, 
            'wallet'=>2000,
        
        ],
        ];
    
        DB::table('details')->insert($details);
    }
}
