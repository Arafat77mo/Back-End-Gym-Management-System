<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleWorkourUsers extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table="single_workout_users	";
    protected $fillable = ['name','user_id','single_workout_caregorie_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

}
