<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    function __construct()
	{
	    $this->comment = new Comment();
	}

	public function index(Request $request)
	{
		$name 			= $request->input('ID');
		$begin_date		= $request->input('begin_date');
		$end_date		= $request->input('end_date');
		$comments		= $this->comment->getAllComments($name,$begin_date,$end_date)->get();

		// dd($comments);
		return view('admin.comment.index',compact('comments'));
	}
}
