<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table="exercises	";
    protected $fillable = ['name','equipment','discription','image','sets','reps','rest','single_workout_caregorie_id'];
    protected $hidden=['created_at','updated_at'];

    public function Slingleworkoutcategory (){
        // return $this->belongsTo(related:'App\Models\SingleWorkoutCaregory',foreignKey:'single_workout_caregorie_id',ownerKey:'id');
        return $this -> belongsTo('App\Models\SingleWorkoutCaregory','single_workout_caregorie_id');


    }
}
