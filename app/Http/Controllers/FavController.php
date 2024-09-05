<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Rate;
use App\Models\Favourite;
use App\Models\User;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;


use Illuminate\Http\Request;

class FavController extends Controller
{
      
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request ,$id)
    {
        $favs=Favourite::query();
        if($favs->where([['favourites.user_id','=',Auth::user()->id],['Favourites.food_id','=',$id]])->exists()){
            $ss='the favourite is already exist';
         return response()->json([['message'=>$ss]]);
         
         // return response()->json(true);
     }
      else{
         $fav=Favourite::create([
             'food_id'=>$id,
             'user_id'=>Auth::user()->id
              ]);

              $mm='the favourite done successfully';
                return response()->json([['message'=>$mm]]);
          }
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
    public function show()
    {
        try{
   
            $response['fav'] = User::join('favourites','users.id','=','favourites.user_id')
            ->join('food','favourites.food_id','=','food.id')
            ->where('favourites.user_id','=',Auth::user()->id)
            ->get(["food.name","food.photo","food.id"]);
            return ($response);
                  }
               catch(Exception $e){
                return $e;
                 }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
    
            $delete =Favourite::query()->where('user_id','=',Auth::user()->id)
            ->where('food_id','=',$id)->delete();
            return  response()->json('success');
                  }
               catch(Exception $e){
                return $e;
                 }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


