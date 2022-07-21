<?php

namespace App\Http\Controllers;



trait ApiResponse

{
 public function apiresponse($data=null,$msg=null, $status=null)
 {
    $array=[
        'data'=>$data,
        'message'=>$msg,
        'status'=>$status

    ];
    return response( $array);

 }



}
