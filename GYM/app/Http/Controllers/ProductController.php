<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
// use App\Http\Controllers\ApiResponse;
class ProductController extends Controller
{

 use ApiResponse;

public function index()
{

 $product =ProductResource::collection(Product::get());
 $msg=['your data returned successfully '];
   return $this->apiresponse($product,$msg,200);



//  return response($product,200,$msg);
}


public function show($id)
{

 $product= new ProductResource(Product::find($id));
 if ($product){
     $msg=['the  product return successfully '];
   return $this->apiresponse($product,$msg,200);


 }else{
    $msg=['this  product not found '];
    return $this->apiresponse($product,$msg,401);
 }




//  return response($product,200,$msg);
}

}
