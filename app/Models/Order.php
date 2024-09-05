<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='orders';
    protected $fillable = [
        'user_id',
        'total_price',

        
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function baskate(){
        return $this->hasMany(Baskate::class);
        }
        public function Location(){
            return $this->hasMany(Location::class);
            }
}
