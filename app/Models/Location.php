<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='locations';
    protected $fillable = [
        'order_id',
        'address',

        
    ];
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
}
}