<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['id ','Carbohydrates','name','Calories','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];


}
