<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='food';
    protected $fillable = [
        'name',
        'photo',
        'price',
        'calories',
        'ingredient',
        'quantity',
        'status',
        'menu_id',
         ];

         public function menu()
         {
             return $this->belongsTo(Menu::class,'menu_id','id');
         }
     public function rate(){
                        return $this->hasMany(Rate::class);
                        }
     public function favourite(){
                            return $this->hasMany(Favourite::class);
                            }
     public function baskate(){
                                return $this->hasMany(Baskate::class);
                                }
                                public function dietSystem()
{
    return $this->belongsTo(DietSystem::class);
}

    
}
