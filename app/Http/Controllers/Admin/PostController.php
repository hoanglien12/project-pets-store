<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
    	$this->post = new Post();
    }

    public function index(Request $request)
    {
    	$request->flash();
        $name           = $request->input('name');
        $begin_date     = $request->input('begin_date');
        $end_date       = $request->input('end_date');

        $count_post 	= count($this->post->getAllDogPosts($name, $begin_date, $end_date)->get());
        $posts 			= $this->post->getAllDogPosts($name,$begin_date,$end_date)->paginate(10);
    	return view('admin.post.index');
    }

    public function add()
    {
    	return view('admin.post.create');
    }
}
