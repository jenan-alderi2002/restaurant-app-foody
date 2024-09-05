<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run(): void

    { 

      $menus = [
          ['name' => 'FastFood', 'photo' => Storage::url('public/fast_food.jpg')],
          ['name' => 'Salad', 'photo' => Storage::url('public/salad.jpg')],
          ['name' => 'Drink', 'photo' => Storage::url('public/drink.jpg')],
      ];

    // Insert the test data into the menus table
  //  DB::table('menus')->truncate();
    DB::table('menus')->insert($menus);
    }
}

