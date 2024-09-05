<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            ['table_number' => 1, 'chair_count' => 4, 'status' => 0,  'price' => 2000,'photo' => Storage::url('public/table1.jpg'),],
            ['table_number' => 2, 'chair_count' => 4, 'status' => 0,  'price' => 2000,'photo' => Storage::url('public/table2.jpg'),],
            ['table_number' => 3, 'chair_count' => 6, 'status' => 0,  'price' => 4000,'photo' => Storage::url('public/table3.jpg'),],
            ['table_number' => 4, 'chair_count' => 6, 'status' => 0,  'price' => 4000,'photo' => Storage::url('public/table4.jpg'),],
            ['table_number' => 5, 'chair_count' => 2, 'status' => 0,  'price' => 1000,'photo' => Storage::url('public/table5.jpg'),],
            ['table_number' => 6, 'chair_count' => 2, 'status' => 0,  'price' => 1000,'photo' => Storage::url('public/table6.jpg'),],
            ['table_number' => 7, 'chair_count' => 4, 'status' => 0,  'price' => 2000,'photo' => Storage::url('public/table7.jpg'),],
            ['table_number' => 8, 'chair_count' => 4, 'status' => 0,  'price' => 2000,'photo' => Storage::url('public/table8.jpg'),],
            ['table_number' => 9, 'chair_count' => 8, 'status' => 0,  'price' => 10000,'photo' => Storage::url('public/table9.jpg'),],
            ['table_number' => 10, 'chair_count'=> 8, 'status' => 0,  'price' => 10000,'photo' => Storage::url('public/table10.jpg'),],
];
DB::table('tables')->insert($tables);
        
    }
}
