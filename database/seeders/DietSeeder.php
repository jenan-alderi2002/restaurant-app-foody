<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DietSystem;
use App\Models\Food;
class DietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Ketogenic Diet record
       /* $ketogenicDiet = DietSystem::create([
            'name' => 'Ketogenic Diet',

            'explanation' => '
            The ketogenic diet is a dietary approach that focuses on reducing carbohydrate intake and increasing fat consumption. This diet aims to push the body into a state known as ketosis, where the body relies on burning fats as the primary source of energy instead of carbohydrates.

            When carbohydrate intake is significantly reduced, your body depletes its primary energy source, which is glucose (sugar). When this happens, the body starts converting stored fats into molecules called ketones, which serve as an alternative fuel for the brain and other organs.

            In addition to weight loss, the ketogenic diet is believed to offer several other health benefits. These benefits include:

            - Increased satiety
            - Improved energy levels
            - Improved blood sugar levels
            - Improved cardiovascular health factors
            ',

            'foods' => '
            Here are some beneficial foods that can be included in your ketogenic diet:

            - Meats and Fish
            - Dairy and Eggs
            - Healthy Fats
            - High-Fiber Vegetables
            - Nuts and Seeds
            - Low-Sugar Fruits
            - Unsweetened Beverages
            ',
        ]);*/
       // Retrieve the DietSystem
       $foods = Food::all();

       $lowCalorieFoods = Food::where('calories', '<=', 200)->get();

       foreach ($lowCalorieFoods as $food) {
           DietSystem::create([
               'name' => 'Healthy Diet',
               'explanation' => 'Explanation of the healthy diet system',
               'food_id' => $food->id
           ]);
       }
       
}
}