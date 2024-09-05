<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='menus';
    protected $fillable = [
        'name',
        'photo',
         ];

    public function food(){
            return $this->hasMany(Food::class);
            }
        }
