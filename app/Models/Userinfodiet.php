<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfodiet extends Model
{
    use HasFactory;
    protected $table = 'userinfodiets';
    protected $fillable = [
    'weight',
    'height'
    ];
}
