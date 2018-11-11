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

	public function index()
	{
		$comments		= Comment::all();
		// dd($users);
		return view('admin.comment.index',compact('comments'));
	}
}
