<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='rates';
    protected $fillable = [
        'user_id',
        'food_id',
        'Ratings',
        'avgRatings',
        //'descreption',

        
    ];
    public function food()
    {
        return $this->belongsTo(Food::class,'food_id','id');
    }
}
