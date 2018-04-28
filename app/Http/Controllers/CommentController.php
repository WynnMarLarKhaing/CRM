<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function create(){
    	$comment = new comment;
    	$comment->comments = request()->comments;
    	$comment->user_id = auth()->user()->id;
		$comment->issue_id = request()->issue_id;
		$comment->save();

		return back();
    }

    public function delete($id){
    	$comment = comment::find($id);
    	$comment->delete();
    	
		return back();
    }
}
