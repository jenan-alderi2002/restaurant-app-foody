<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;
use App\Models\Reservation;
use App\Models\Table;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $food = Food::all();
        return response()->json(['food' => $food], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  $response = Food::leftjoin('rates','food.id','=','rates.food_id')
        ->join('menus' , 'menus.id' , '=' , 'food.menu_id')
        ->where('food.id' , '=' , $id)
        ->distinct()
        ->get(["food.menu_id","food.id","food.name","food.photo","food.price" , "food.calories" , "food.ingredient" , "food.quantity" , "rates.Ratings" ]);
          return ($response);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function Search($name){
              
    $foods = Food::where('name', 'like', '%' . $name . '%')->get();
    if ($foods->isEmpty()) {
        
        return response()->json([['message' => 'No food found']], 404);
    }
    return response()->json($foods, 200);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
