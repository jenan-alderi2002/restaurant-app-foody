<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;


class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $menus = Menu::all();
          // Create food

          $food = [
              [
                  'menu_id' => 1,
                  'name' => 'Big Mac',
                  'photo' => Storage::url('public/big_mac.jpg'),
                  'price' => 3.99,
                  'calories' => 540,
                  'ingredient' => 'Two all-beef patties, special sauce, lettuce, cheese, pickles, onions on a sesame seed bun',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Whopper',
                  'photo' => Storage::url('public/whopper.jpg'),
                  'price' => 4.49,
                  'calories' => 660,
                  'ingredient' => 'Flame-grilled beef patty, sesame seed bun, mayonnaise, lettuce, tomato, pickles, ketchup, onion',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Quarter_Pounder_Cheese',
                  'photo' => Storage::url('public/quarter_pounder_Cheese.jpg'),
                  'price' => 4.79,
                  'calories' => 530,
                  'ingredient' => 'Quarter pound* of 100% fresh beef**, cheese, onions, pickles, mustard, and ketchup on a toasted sesame seed bun.',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Crispy Chicken Sandwich',
                  'photo' => Storage::url('public/crispy_chicken_sandwich.jpg'),
                  'price' => 5.49,
                  'calories' => 670,
                  'ingredient' => 'Crispy chicken breast, lettuce, tomato, mayonnaise, on a sesame seed bun',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Classic Chicken Sandwich',
                  'photo' => Storage::url('public/classic_chicken_sandwich.jpg'),
                  'price' => 4.99,
                  'calories' => 440,
                  'ingredient' => 'Juicy all-white meat chicken filet, lettuce, tomato, and mayo on a sesame seed bun',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Spicy Chicken Sandwich',
                  'photo' => Storage::url('public/spicy_chicken_sandwich.jpg'),
                  'price' => 5.49,
                  'calories' => 700,
                  'ingredient' => 'Spicy crispy chicken breast, lettuce, tomato, and mayonnaise on a sesame seed bun',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Taco',
                  'photo' => Storage::url('public/taco.jpg'),
                  'price' => 1.39,
                  'calories' => 170,
                  'ingredient' => 'Seasoned beef, lettuce, cheddar cheese, and signature salsa in a crunchy taco shell',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Famous Bowl',
                  'photo' => Storage::url('public/famous_bowl.jpg'),
                  'price' => 5.99,
                  'calories' => 710,
                  'ingredient' => 'Mashed potatoes, sweet corn, crispy chicken, and gravy, topped with shredded cheese and served in a convenient bowl',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Double Cheeseburger',
                  'photo' => Storage::url('public/double_cheeseburger.jpg'),
                  'price' => 2.99,
                  'calories' => 430,
                  'ingredient' => 'Two juicy beef patties, melted American cheese, pickles, onions, ketchup, and mustard on a toasted bun',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
              [
                  'menu_id' => 1,
                  'name' => 'Chick-n-Strips',
                  'photo' => Storage::url('public/chick_n_strips.jpg'),
                  'price' =>6.99,
                  'calories' => 1230,
                  'ingredient' => 'Boneless chicken breast strips, hand-breaded and seasoned with a blend of spices, served with your choice of dipping sauce',
                  'quantity' => 100,
                  'status' => 'Existing',
              ],
                  // Create salad
   [
                      'menu_id' => 2,
                      'name' => 'Arugula Salad',
                      'photo' => Storage::url('public/arugula_salad.jpg'),
                      'price' => 7.99,
                      'calories' => 150,
                      'ingredients' => 'Arugula, Tomatoes, Cucumber, Red Bell Pepper, Red Onion, Feta Cheese, Oil',
                      'quantity' => 100,
                      'status' => 'Existing',
                  ],
                  [
                      'menu_id' => 2,
                      'name' => 'Quinoa Salad',
                      'photo' => Storage::url('public/quinoa_salad.jpg'),
                      'price' => 9.99,
                      'calories' => 220,
                      'ingredients' => 'Quinoa, Lettuce, Tomatoes, Red Onion, Red Bell Pepper, Cheese, Hot Sauce',
                      'quantity' => 100,
                      'status' => 'Existing',
                  ],
                  [
                      'menu_id' => 2,
                      'name' => 'Greek Salad',
                      'photo' => Storage::url('public/greek_salad.jpg'),
                      'price' => 8.99,
                      'calories' => 180,
                      'ingredients' => 'Lettuce, Tomatoes, Cucumber, Red Onion, Olives, Feta Cheese, Oil and Vinegar',
                      'quantity' => 100,
                      'status' => 'Existing',
                  ],
                  [
                      'menu_id' => 2,
                      'name' => 'Caesar Salad',
                      'photo' => Storage::url('public/caesar_salad.jpg'),
                      'price' => 7.99,
                      'calories' => 230,
                      'ingredients' => 'Romaine Lettuce, Croutons, Parmesan Cheese, Caesar Dressing',
                      'quantity' => 100,
                      'status' => 'Existing',
                  ],
                  [
                      'menu_id' => 2,
                      'name' => 'Cobb Salad',
                      'photo' => Storage::url('public/cobb_salad.jpg'),
                      'price' => 9.99,
                      'calories' => 320,
                      'ingredients' => 'Lettuce, Chicken, Bacon, Avocado, Tomatoes, Cheese, Ranch Dressing',
                      'quantity' => 100,
                      'status' => 'Existing',
                  ],
                  [
                      'menu_id' => 2,
                      'name' => 'Spinach Salad',
                      'photo' => Storage::url('public/spinach_salad.jpg'),
                      'price' => 8.99,
                      'calories' => 170,
                      'ingredients' => 'Spinach, Bacon, Mushrooms, Red Onion, Hard-Boiled Egg, Vinegar and Oil',
                      'quantity' => 100,
                      'status' => 'Existing',
                  ],
          // Create drink
    [  
        
            'menu_id' => 3,
        'name' => 'Coke',
        'photo' => Storage::url('public/Coke.jpg'),
        'price' => 1.99,
        'calories' => 140,
        'ingredients' => 'Carbonated Water, High Fructose Corn Syrup, Caramel Color, Phosphoric Acid, Natural Flavors, Caffeine',
        'quantity'=>100,
        'status'=>'Existing',
    ],
    [
        'menu_id' => 3,
        'name' => 'Sprite',
        'photo' => Storage::url('public/Sprite.jpg'),
        'price' => 1.99,
        'calories' => 140,
        'ingredients' => 'Carbonated Water, High Fructose Corn Syrup, Citric Acid, Natural Flavors, Sodium Benzoate',
        'quantity'=>100,
        'status'=>'Existing',
    ],
    [
        'menu_id' => 3,
        'name' => 'Lemonade',
        'photo' => Storage::url('public/Lemonade.jpg'),
        'price' => 2.99,
        'calories' => 200,
        'ingredients' => 'Water, Lemon Juice, Sugar, Lemon Slices',
        'quantity'=>100,
        'status'=>'Existing',
    ],
    ['menu_id' => 3,
    'name' => 'Iced Tea',
    'photo' => Storage::url('public/IcedTea.jpg'),
    'price' => 2.99,
    'calories' => 80,
    'ingredients' => 'Water, Tea Leaves, Sugar, Lemon Slices',
    'quantity' => 100,
    'status' => 'Existing',
    ],
    [
    'menu_id' => 3,
    'name' => 'Orange Juice',
    'photo' => Storage::url('public/Orange_Juice.jpg'),
    'price' => 3.99,
    'calories' => 150,
    'ingredients' => 'Fresh Oranges, Water, Sugar',
    'quantity' => 100,
    'status' => 'Existing',
    ],
    [
        'menu_id' => 3,
        'name' => 'Water',
        'photo' => Storage::url('public/water.jpg'),
        'price' => 0.99,
        'calories' => 0,
        'ingredients' => 'null',
        'quantity'=>100,
        'status'=>'Existing',
    ],
    ];

    DB::table('food')->insert($food);
   /* $foods = DB::table('food')->get();

    foreach ($foods as $food) {
        $menu = Menu::find($food->menu_id);
     *   $food = new Food((array)$food);
     *   $food->save();
    // Cast $food to an array and create a new Food instance
        $food->menu()->associate($menu);*/
//        DB::table('food')->dropForeign('food_menu_id_foreign');

    /*$menu = Menu::find(1); // Replace 23 with the actual menu_id value

$food->menu()->associate($menu);
$food->save();*/
    }
}
