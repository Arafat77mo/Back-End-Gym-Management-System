<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\ApiResponse;
class ProductController extends Controller
{

 use ApiResponse;

public function index()
{

 $product =ProductResource::collection(Product::get());
 $msg=['your data returned successfully '];
//    return response()->json($product);
// return $this->apiresponse( $product,$msg,200);
return($product) ;




   return $this->apiresponse($product,$msg,200);
//  return response($product,200,$msg);
}


public function show($id)
{

 $product= Product::find($id);
 if ($product){
    return response()->json($product);

     $msg=['the  product return successfully '];
//    return $this->apiresponse(new ProductResource($product));
return $this->apiresponse( $product,$msg,200);



 }else{
    $msg=['this  product not found '];
    return $this->apiresponse($product,$msg,404);
 }


}



public function store(Request $request ){

// $product =Product::create($request ->all());
$fileSystem = "";
            $fileSystem = uploadImage("products",$request->image);
$product = Product::create([
    "id" => $request->id,
    "name" =>$request->name,
    "price" =>$request->price,
    'amount' => $request->amount,
    "details" =>$request->details,
    "image" => $fileSystem]);



if ($product){
    $msg=['the  product added successfully '];
//   return $this->apiresponse(new ProductResource($product));
return $this->apiresponse($product,$msg,200);



}else{
    $msg=['this  product not saved '];
    return $this->apiresponse($product,$msg,400);
 }



}


public function update(request $request,$id){
    $product=Product::find($id);

    $product->update($request->all());

   if($product){

    return response(new ProductResource($product),201);
 }
 else{
    return['result'=>'product not  found'];

   }

}





public function deleteproduct($id){
    $product=Product::find($id);
    $result = $product->delete();
    if($result){
        return['result'=>'product deleted'];
       }else{
        return['result'=>'product not  deleted'];

       }
//  return response($product,200,$msg);
}

public function RelatedProducts($id)
    {
        $books = Product::find($id);
        $relation = Product::where('id',$id)->with('categories')->first();
        $category_id = $relation->category_id;
        $relatedbooks = Product::where('category_id',$category_id)->get();
        return  ($relatedbooks);
    }


}
