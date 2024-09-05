<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='reservations';
    protected $fillable = [
        'user_id',
        'table_id',
        'date',
        'time_in',
        'time_out',
       // 'number_customer',
     
      


        
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function Table()
    {
        return $this->belongsTo(Table::class,'table_id','id');
    }
}
