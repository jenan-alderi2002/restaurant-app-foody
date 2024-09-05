<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Order;
use Illuminate\Http\Response;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id)
    {
        $validated = $request->validate([
            'address' => ['required', 'string'],
        ]);

        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $location = new Location($validated);
        $order->location()->save($location);

        return response()->json(['message' => 'Location created successfully']);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $order_id)
    {
        $validated = $request->validate([
            'address' => ['required', 'string'],
        ]);
    
        $order = Order::find($order_id);
    
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
    
        $location = $order->location->first();
    
        if (!$location) {
            $location = new Location();
            $order->location()->save($location);
        }
    
        $location->fill($validated);
        $location->save();
    
        return response()->json(['message' => 'Location updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
