<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sessions";
    protected $fillable = ['name'];

    public function trainers () {

        return $this -> hasMany('App\Models\Trainer','session_id');
    }

}
