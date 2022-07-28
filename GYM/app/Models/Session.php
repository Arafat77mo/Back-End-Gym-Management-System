<?php

namespace App\Models;
use  App\Models\Trainer;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sessions";
  

    public function trainers () {

        return $this -> hasMany('App\Models\Trainer','session_id');
    }

    protected $fillable = ['name','Duaration','discount','description','price','Day','Time','image'];



}
