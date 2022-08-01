<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "members";
    protected $fillable = ['name','user_id','expire'];

    public function user () {

        return $this -> belongsTo('App\Models\User', 'user_id');
    }


}
