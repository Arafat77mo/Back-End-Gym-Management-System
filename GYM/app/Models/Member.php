<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "members";
    protected $fillable = ['name','expire','session_id','email','user_id'];

    public function user () {
        return $this -> belongsTo('App\Models\User', 'user_id');
    }


    public function session () {
        return $this -> belongsTo(Session::class, 'session_id');
    }


}
