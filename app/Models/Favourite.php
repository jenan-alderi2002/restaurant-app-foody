<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use  HasFactory ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='favourites';
    protected $fillable = [
        'user_id',
        'food_id',

        
    ];
    public function food()
    {
        return $this->belongsTo(Food::class,'food_id','id');
    }
}
