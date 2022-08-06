<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table="categories";

    protected $fillable = ['id ','price','name','slug'];

    public function Products(){
        return $this->hasmany(Product::class, 'category_id');
    }

}
