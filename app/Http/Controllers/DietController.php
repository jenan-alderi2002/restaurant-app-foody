<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DietSystem;
use App\Models\UserInfoDiet;
use Illuminate\Http\Response;
use App\Models\Food;




class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowCalorieFoods = Food::where('calories', '<=', 200)->get();

        return response()->json($lowCalorieFoods);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {$request->validate([
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
    ]);

    $weight = $request->input('weight');
    $height = $request->input('height');

    $bmi = $weight / (($height / 100) * ($height / 100));

    $message = '';
    if ($bmi > 25) {
        $message = 'You should consult the diet system in the application.';
    } else {
        $message = 'Your weight is normal.';
    }

    return response()->json(['message' => $message]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dietSystem = DietSystem::findOrFail($id);

        return response()->json($dietSystem);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
