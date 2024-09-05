<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='tables';
    protected $fillable = [
        'table_number',
        'chair_count',
        'status',
        'price',
        'photo'
    ];

   public function reservation(){
        return $this->hasMany(Reservation::class);
        }
        public function table(){
            return $this->hasMany(Table::class);
            }
}
