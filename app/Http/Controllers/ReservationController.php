<?php

namespace App\Http\Controllers;

use App\Models\Detail;
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
use App\Models\UserInfo;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    
    public function create(Request $request )
    {
        $booking=Validator::make($request->all(),[
        
            "user_id" => 'required',
            "table_id" => 'required',
            "date"=>'required',
            "time_in"=>'required',
            "time_out"=>'required',
            ]);
            if($booking->fails())
            {
                return response()->json(['message'=>$booking->errors()]);
            }
              $tablees = Table::query()->first('table_number');
              $price = Table::where('id' , '=' ,$request->table_id)->first('price');
              
            $user = User::find($request->user_id); 
            $reserve = Reservation::query();
               $AdminWallet = Detail::query()->value('wallet'); 
               
               $userwallet = UserInfo::where('user_id' , '=' , $request->user_id)->value('wallet');
              // return($userwallet);
               if($userwallet < $price->price)
               {
                return response()->json([['message' =>'u dont have enough money to pay']]);
               }

               else {

                $newuserWallet=$userwallet-$price->price;
                $newadminWallet=$AdminWallet+$price->price;

                Detail::where('id' , '=' , 1)->update(['wallet' => $newadminWallet]);
                UserInfo::where('user_id' , '=' , $request->user_id)->update(['wallet'=> $newuserWallet]);
                $bookingStartTime = Carbon::create($request->date . ' ' . $request->time_in);
               // return($bookingStartTime);

                $bookingEndTime = Carbon::create($request->date . ' ' . $request->time_out);
               // return($bookingEndTime);
    
                        
                $currentTime = Carbon::now();
                   //   return($currentTime);
                if ($currentTime->between($bookingStartTime, $bookingEndTime)) {
                    //return('ssss');
                     $tablees->where('id' , '=' , $request['table_id'])->update([
                     'status' => 1
                          ]); 
                           }
                        else{

                               $tablees->where('id' , '=' , $request->table_id)->update([
                                       'status' => 0]);
                              // return('fff');
                             }

             $book = Reservation::create([
              "user_id" => $request->user_id,
              "table_id" => $request->table_id,
              "date" => $request->date,
              "time_in" => $request->time_in,
              "time_out" => $request->time_out,
                 ]);
                        return response()->json([['message' =>'your reservation is done succsesfully']]);
                                
                
    }    }                          

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $tablefree = Table::where('status' , '=' , 0) ;
         if($tablefree)
         {
              $found=$tablefree->get(['id','table_number' , 'chair_count' , 'price','photo']);
              return response()->json($found);
         }

else{
    return response()->json([['there is no table free , resend the request hoppe one table will be free soon ^_^']]);
}

    }


    public function profile(Request $request)
    {
        $data = Validator::make($request->all(), [
            'phone' => 'required',
            'wallet' => 'required',
        ]);
        if ($data->fails()) {
            $er = 'error';
            return response()->json(['message' => $data->errors()]);
        }
    $userinfo = UserInfo::create([
      'phone' => $request['phone'],
      'wallet' => $request['wallet'],
      'user_id'=> Auth::user()->id

]);
$mm = 'success';
return response()->json(['message' => $mm], 200);
}

public function update(Request $request, $id)
    {
        $booking = Validator::make($request->all(), [
            "user_id" => 'required',
            "table_id" => 'required',
            "date" => 'required',
            "time_in" => 'required',
            "time_out" => 'required',
        ]);
    
        if ($booking->fails()) {
            return response()->json(['message' => $booking->errors()], 400);
        }
    
        $book = Reservation::find($id);
    
        if (!$book) {
            return response()->json(['message' => 'Reservation not found!'], 404);
        }
    
        $book->user_id = $request->user_id;
        $book->table_id = $request->table_id;
        $book->date = $request->date;
        $book->time_in = $request->time_in;
        $book->time_out = $request->time_out;
        $book->save();
    
        return response()->json(['message' => 'Reservation updated successfully'], 200);
    }

public function delete($id)
    {
        $book = Reservation::find($id);

        if (!$book) {
            return response()->json(['message' => 'Reservation not found!']);
        }

        $book->delete();

        return response()->json(['message' => 'Reservation deleted successfully!']);
    }

    public function showreseerv($id)
    {
           $reserv = Reservation::query()->where('user_id' , '=' , $id);
              $info=  $reserv->get([
'id','table_id','time_in','time_out','date'

                ]);
                return($info);
    }


}
