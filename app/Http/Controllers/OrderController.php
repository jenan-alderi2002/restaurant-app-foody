<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baskate;
use App\Models\Detail;
use App\Models\Food;
use App\Models\Location;
use App\Models\Order;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\determination;
use Carbon\Carbon;
use Exception;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Spatie\FlareClient\Solutions\ReportSolution;

class OrderController extends Controller
{


    public function addorder(Request $request ){

    $order = Order::create([
      'user_id'=>Auth::user()->id,
      'total_price'=>0

    ]);
    $aa='your order is created succsessfully';
    return response()->json([['massege'=>$aa,'order_id'=>$order->id]]);
   

    }


    public function create(Request $request ){

        $data=Validator::make($request->all(),[ 
            "food_id" => 'required',
            "quntity"=>'required',
            "note"=>'required',
            ]);
            if($data->fails())
            {
                return response()->json(['message'=>$data->errors()]);
            }
                $quantity = Food::query()->where('id' , '=' , $request->food_id)->first('quantity');
              $order = Order::query()->get('id');
             // return($order);
               $price = Food::query()->where('id' , '=' , $request->food_id)->value('price');
               $newprice = $price * $request->quntity;
               if($order->isEmpty()){
                $message = 'you should create a new order first ';
           return response()->json(['message'=>$message]);
    
               }
               else{
        
               $basket = Baskate::create([
               'order_id' => $request->order_id,
               'food_id' => $request['food_id'],
               'quntity' => $request['quntity'],
               'note' => $request['note'],
               'price' => $newprice
               ]);
            
    
    }
        
               $newquantity = $quantity->quantity - $request->quntity;
               Food::query()->where('id' , '=' , $request->food_id)->update([
                       'quantity' => $newquantity   
               ]);
                 $aa='your order id add to basket_food succsessfully';
                       return response()->json([['massege'=>$aa,'order_id'=>$request->order_id]]);
            }


 public function show($id)
 {

         $order = Order::query()->where('id' , '=' , $id)->get();
         if(!$order->isEmpty()){


      $pasket = Food::join('baskates','food.id','=','baskates.food_id')
      ->join('orders','baskates.order_id','=','orders.id')
      ->get(['food.name','food.photo','baskates.food_id' , 'baskates.quntity' , 'baskates.note' , 'baskates.price']);
      
      $price = Order::query()->where('id' , '=' , $id)->first('total_price');

      $pricefood = Baskate::query()->where('order_id' , '=' , $id)->get();

      $totalPrice = 0;
      foreach ($pricefood as $food) {
          $totalPrice += $food->price;
      }
  
      // Add the total price to the existing order total price
      $newTotalPrice = $price->total_price + $totalPrice;
  
      // Update the order total price
      Order::query()->where('id', $id)->update(['total_price' => $newTotalPrice]);
   //  

      return response()->json(['Orders'=>$pasket , 'totalPrice'=>$newTotalPrice]);

    }
    else
    {
        $mm = "There is no order. You must create an order and fill the cart ";
        return response()->json(['message'=>$mm]);
    }
 }





 public function pay(Request $request , $id)
 {

    $location=Location::where('order_id', '=' , $id)->first();
    //return response()->json($location);
    $AdminWallet = Detail::query()->value('wallet'); 

    $userwallet = UserInfo::where('user_id' , '=' , Auth::user()->id)->value('wallet');
//return($userwallet);
    $price = Order::query()->where('id' , '=' , $id)->first('total_price');
    $value = Order::query()->where('id' , '=' , $id)->value('total_price');
if($location!=null)
{
    if($userwallet < $price->total_price)
    {
        $bb='u dont have enough money to pay';
     return response()->json([['message'=>$bb]]);
    }
    else {

     $newuserWallet=$userwallet-$price->total_price;
     $newadminWallet=$AdminWallet+$price->total_price;

     Detail::where('id' , '=' , 1)->update(['wallet' => $newadminWallet]);
     UserInfo::where('user_id' , '=' , Auth::user()->id)->update(['wallet'=> $newuserWallet]);
     Order::query()->where('user_id', Auth::user()->id)->update(['total_price' => $value]);
     $cc='youre order is created successfully';
         return response()->json([['message'=>$cc]]);
        // DB::table('orders')->where('id' , '=' , 1)->delete();

    }

 }
  else{
    $dd='you should enter youre location first';
    return response()->json(['message'=>$dd]);
  }
 }

 public function updateprice(Request $request , int $id)
    {
        $userwallet = UserInfo::where('user_id' , '=' , Auth::user()->id)->first('wallet');
                $newuserWallet=$userwallet->wallet + $id;
                //return($newuserWallet);
            UserInfo::where('user_id' , '=' , Auth::user()->id)->update(['wallet'=> $newuserWallet]);
          
            return response()->json([["message"=>"The wallet has been loaded successfully" ]],200);

                
            }
          
            public function showorder($id)
            {  
                
              $response= food::join('baskates' , 'food.id' , '=' , 'baskates.food_id')
              ->join('orders' , 'baskates.order_id' , '=' , 'orders.id')
              ->join('users' , 'orders.user_id' , '=' , 'users.id')
              ->distinct()
              ->where('user_id' , '=' , $id)
              ->get(['orders.id','food.name' ,'food.photo', 'baskates.quntity' , 'baskates.note' , 'baskates.price' , 'orders.total_price']);
            // Group the food items by order
    $orders = [];
    foreach ($response as $item) {
        $orderId = $item->id;
        if (!isset($orders[$orderId])) {
            $orders[$orderId] = [
                'order' => $orderId,
                'items' => []
            ];
        }
        $orders[$orderId]['items'][] = [
            'name' => $item->name,
            'photo' => $item->photo,
            'quantity' => $item->quntity,
            'note' => $item->note,
            'price' => $item->price
        ];
    }

    return $orders;
}



public function update(Request $request, $id)
{
    $order = Order::find($id);

    if (!$order) {
        return response()->json(['message' => 'Order not found'], 404);
    }

    $data = Validator::make($request->all(), [
        "food_id" => 'required',
        "quntity" => 'required',
        "note" => 'required',
    ]);

    if ($data->fails()) {
        return response()->json(['message' => $data->errors()]);
    }

    $food = Food::find($request->food_id);

    if (!$food) {
        return response()->json(['message' => 'Food not found'], 404);
    }

    $basket = Baskate::where('order_id', $id)->where('food_id', $request->food_id)->first();

    if (!$basket) {
        return response()->json(['message' => 'Basket item not found'], 404);
    }

    $originalQuantity = $basket->quntity;
    $newQuantity = $request->quntity;

    // Check if the requested quantity is greater than the available quantity of the food item
    if ($newQuantity > $food->quantity) {
        return response()->json(['message' => 'Not enough food quantity available'], 400);
    }

    // Calculate the difference in price between the old and new basket items
    $priceDiff = ($food->price * $newQuantity) - ($originalQuantity == 0 ? 0 : $basket->price / $originalQuantity * $newQuantity);
    // Update the order's total price
    $order->total_price += $priceDiff;
    $order->save();

    // Update the food's quantity
    $quantityDiff = $originalQuantity - $newQuantity;
    $newFoodQuantity = $food->quantity + $quantityDiff;
    $food->quantity = $newFoodQuantity;
    $food->save();

    // Update the basket item's quantity and price
    $newPrice = $food->price * $newQuantity;
    $basket->quntity = $newQuantity;
    $basket->note = $request->note;
    $basket->price = $newPrice;
    $basket->save();

    return response()->json(['message' => 'Order updated successfully']);
}





public function delete($id)
{
    $order = Order::find($id);

    if (!$order) {
        return response()->json(['message' => 'Order not found'], 404);
    }

    DB::beginTransaction();

    try {
        $baskets = $order->Baskate;

        foreach ($baskets as $basket) {
            $food = Food::find($basket->food_id);
            $food->increment('quantity', $basket->quntity);
        }

        $order->delete();

        DB::commit();

        return response()->json(['message' => 'Order deleted successfully']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => 'Failed to delete order'], 500);
    }
}

}



