<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baskate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='baskates';
    protected $fillable = [
        'order_id',
        'food_id',
        'quntity',
        'price',
        'note',

        
    ];
    public function food()
    {
        return $this->belongsTo(Food::class,'food_id','id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

}
