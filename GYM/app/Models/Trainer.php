<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\session;

class Trainer extends Model
{
    use HasFactory, softDeletes;

    protected $table = "trainers";
    protected $fillable = ['name','phone', 'gender','image','session_id'];

    public function sessions () {

        return $this -> belongsTo('App\Models\Session','session_id');




    }
}
