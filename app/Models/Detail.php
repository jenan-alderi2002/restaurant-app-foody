<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{

    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='details';
    protected $fillable = [
        'name',
        'location',
        'phone',
        'time_in',
        'time_out',
        'discraption',
        'number_table',
        'number_chair',
        'wallet',
        'user_id',
         ];

         public function admin(){
            return $this->belongsTo(Admin::class,'admin_id','id');
            }
}
