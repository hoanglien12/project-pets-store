<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;


class CommentController extends Controller
{
    function __construct()
	{
	    $this->comment = new Comment();
	}

	public function index()
	{
		
		$comments		= Comment::all();
		$orders_waiting = Order::where('status',1)->get();
		// dd($comments);
		
		return view('admin.comment.index',compact('comments','orders_waiting'));
	}
}
