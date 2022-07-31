<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleWorkoutCaregory extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table="single_workout_caregories	";
    protected $fillable = ['name','level','body_place','image'];
    protected $hidden=['created_at','updated_at'];

    public function exercies (){
        return $this->hasMany(related:'App\Models\Exercise',foreignKey:'single_workout_caregorie_id',localKey:'id');
    }


    public function users(){
        return $this->belongsToMany(related:'App\Model\User',table:'single_workout_users',foreignPivotKey:'single_workout_caregorie_id',relatedPivotKey:'user_id',parentKey:'id',relatedKey:'id');
    }

}
