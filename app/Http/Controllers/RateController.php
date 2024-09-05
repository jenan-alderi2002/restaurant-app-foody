<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Rate;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

use Illuminate\Http\Request;

class RateController extends Controller
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
    public function create(Request $request , $food_id)
    {
        $data = Validator::make($request->all(), [
            'Ratings' => 'required|min:1|max:5',
        ]);
        if ($data->fails()) {
            return response()->json(['message' => $data->errors()]);}
            $rates = Rate::query();
            $averege=$request['avgRatings'] = 0;
            if(!$rates -> where('user_id' , '=' , Auth::user()->id)->exists())
            {
                if(!$rates -> where('food_id' , '=' , $food_id)->exists())
                {  
                     $rate = Rate::create 
                     (
                        [
                            'Ratings' => $request['Ratings'],
                            'user_id' => Auth::user()->id,
                            'food_id' => $food_id,
                           // 'descreption' => $request['descreption'],
                             'avgRatings' =>  $averege
                        ]
                        );
                }
            } else {
                $ratees = Rate::query()->where('user_id', '=', Auth::user()->id);
                $ratees->update($request->only('Ratings'));
            }
           
            return response()->json(true);
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
    $response= Food::join('rates','food.id','=','rates.food_id')
    ->distinct()
    ->get(["food.id","food.menu_id","food.name","food.photo","food.price"]);
     $top['top_rated']= $response->sortBy('rates.avgRatings');
     return ($top);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function avgrate(Request $request , $food_id)
    {
        $ratee = Rate::query()->first('avgRatings');
       // return response()->json($avgrate);
        $sumrating = Rate::where('food_id', $food_id)->sum('Ratings');
        $countrating = Rate::where('food_id', $food_id)->count();
        $avg = $sumrating / $countrating;
           $ratee->where('food_id', $food_id)->update([
                'avgRatings' =>  $avg
             ]);
        return response()->json(['average_rating' => $avg]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
