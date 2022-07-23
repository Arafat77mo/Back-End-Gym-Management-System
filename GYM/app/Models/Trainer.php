<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\session;

class Trainer extends Model
{
    use HasFactory, softDeletes;


    public function session(){
        return $this->belongsTo(Session::class,'session_id');
    }
}
