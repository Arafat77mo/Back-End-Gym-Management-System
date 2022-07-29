<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    public function categories(){
        return $this->BelongsTo(category::class, 'category_id');
    }
}
