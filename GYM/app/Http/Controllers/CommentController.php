<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;



class CommentController extends Controller
{
    //
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:255',
        ]);

        if ($validator->fails()) {

            return response($validator->errors(), 400);
        }



        $comment = Comment::create($request->all());

       
        return $comment;
    }


 public function index(){
       $comment = Comment::all();
        return $comment;
    }

  

    public function show($id){
    //   $comment = Comment::find($id);
    //   $relation = Comment::where('id',$id)->with('sessions')->first();
    //   $session_id = $relation->session_id;
        $comments = Comment::query()->where('session_id',$id)->get();
        if($comments)
        return $comments;

    }

    public function destory($id){
        $comment =Comment::query()->where('user_id',$id)->delete();
        if(!$comment)
        return $this->returnError('404','the comment NotFound');

        // $comment->delete($id);
        return $comment;
    }
}

